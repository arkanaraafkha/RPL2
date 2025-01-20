<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
use App\Models\Cart;
use App\Models\Product;
use DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class PaypalController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function payment(Request $request)
    {
        // Mengambil data keranjang belanjaan pengguna
        $cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->get()->toArray();

        $data = [];

        // Menyiapkan data item untuk Midtrans
        $data['items'] = array_map(function ($item) {
            $name = Product::where('id', $item['product_id'])->pluck('title')->first();
            return [
                'id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $name
            ];
        }, $cart);

        $data['invoice_id'] = 'ORD-' . strtoupper(uniqid());
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $data['total'] = $total;
        if (session('coupon')) {
            $data['shipping_discount'] = session('coupon')['value'];
        }

        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);

        // Mengonfigurasi transaksi Midtrans
        $transaction_details = [
            'order_id' => $data['invoice_id'],
            'gross_amount' => $data['total']
        ];

        $customer_details = [
            'first_name' => auth()->user()->name,
            'email' => auth()->user()->email
        ];

        $transaction = [
            'transaction_details' => $transaction_details,
            'item_details' => $data['items'],
            'customer_details' => $customer_details
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        request()->session()->flash('error', 'Your payment was canceled.');
        return redirect()->route('home');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        // Ambil order_id dari request
        $order_id = $request->input('order_id');

        // Ambil status transaksi dari Midtrans
        $transaction_status = Transaction::status($order_id);

        // Periksa status transaksi
        if (isset($transaction_status->transaction_status) && in_array($transaction_status->transaction_status, ['capture', 'settlement'])) {
            request()->session()->flash('success', 'You successfully paid with Midtrans! Thank you.');
            session()->forget('cart');
            session()->forget('coupon');
            return redirect()->route('home');
        }

        request()->session()->flash('error', 'Something went wrong, please try again!!!');
        return redirect()->back();
    }
}
