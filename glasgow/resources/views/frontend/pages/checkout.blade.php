@extends('frontend.layouts.master')

@section('title', 'Checkout page')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form id="payment-form" class="form" method="POST" action="{{ route('cart.order') }}">
                @csrf
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>First Name<span>*</span></label>
                                        <input type="text" name="first_name" placeholder=""
                                            value="{{ old('first_name') }}" value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Last Name<span>*</span></label>
                                        <input type="text" name="last_name" placeholder="" value="{{ old('lat_name') }}">
                                        @error('last_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" placeholder="" value="{{ old('email') }}">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input type="number" name="phone" placeholder="" required
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Provinsi<span>*</span></label>
                                        <select name="country" id="country">
                                            <option value="ID"selected="selected">Jakarta</option>
                                            <option value="AC">Aceh</option>
                                            <option value="SU">Sumatera Utara</option>
                                            <option value="SB">Sumatera Barat</option>
                                            <option value="RI">Riau</option>
                                            <option value="KR">Kepulauan Riau</option>
                                            <option value="JA">Jambi</option>
                                            <option value="SS">Sumatera Selatan</option>
                                            <option value="BB">Bangka Belitung</option>
                                            <option value="BE">Bengkulu</option>
                                            <option value="LA">Lampung</option>
                                            <option value="JK">Jawa Barat</option>
                                            <option value="BT">Banten</option>
                                            <option value="JT">Jawa Tengah</option>
                                            <option value="JI">Jawa Timur</option>
                                            <option value="YO">Yogyakarta</option>
                                            <option value="BA">Bali</option>
                                            <option value="NB">Nusa Tenggara Barat</option>
                                            <option value="NT">Nusa Tenggara Timur</option>
                                            <option value="KB">Kalimantan Barat</option>
                                            <option value="KT">Kalimantan Tengah</option>
                                            <option value="KI">Kalimantan Timur</option>
                                            <option value="KS">Kalimantan Selatan</option>
                                            <option value="KU">Kalimantan Utara</option>
                                            <option value="SA">Sulawesi Utara</option>
                                            <option value="ST">Sulawesi Tengah</option>
                                            <option value="SG">Sulawesi Tenggara</option>
                                            <option value="SR">Sulawesi Barat</option>
                                            <option value="SN">Sulawesi Selatan</option>
                                            <option value="GO">Gorontalo</option>
                                            <option value="MA">Maluku</option>
                                            <option value="MU">Maluku Utara</option>
                                            <option value="PA">Papua</option>
                                            <option value="PB">Papua Barat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line 1<span>*</span></label>
                                        <input type="text" name="address1" placeholder=""
                                            value="{{ old('address1') }}">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" name="address2" placeholder=""
                                            value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="post_code" placeholder=""
                                            value="{{ old('post_code') }}">
                                        @error('post_code')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Total
                                            Pesanan<span>Rp{{ number_format(Helper::totalCartPrice(), 2) }}</span></li>
                                        <li class="shipping">
                                            Ongkos Kirim <span>Gratis</span>
                                            @if (0)
                                            @else
                                            @endif
                                        </li>

                                        @if (session('coupon'))
                                            <li class="coupon_price" data-price="{{ session('coupon')['value'] }}">You
                                                Save<span>Rp{{ number_format(session('coupon')['value'], 2) }}</span></li>
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session('coupon')) {
                                                $total_amount = $total_amount - session('coupon')['value'];
                                            }
                                        @endphp
                                        @if (session('coupon'))
                                            <li class="last" id="order_total_price">
                                                Total<span>Rp{{ number_format($total_amount, 2) }}</span></li>
                                        @else
                                            <li class="last" id="order_total_price">
                                                Total<span>Rp{{ number_format($total_amount, 2) }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                        <form-group>
                                            <input name="payment_method" type="radio" value="cod"> <label> Cash On
                                                Delivery</label><br>
                                            <input name="payment_method" type="radio" value="midtrans"> <label>
                                                Midtrans</label>
                                        </form-group>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src=>
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button id="pay-button" type="submit" class="btn">proceed to
                                            checkout</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->


    <!-- End Single Service -->
    </div>
    </div>
    </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->

    <!-- End Shop Newsletter -->
@endsection
@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        function showMe(box) {
            var checkbox = document.getElementById('shipping').style.display;
            // alert(checkbox);
            var vis = 'none';
            if (checkbox == "none") {
                vis = 'block';
            }
            if (checkbox == "block") {
                vis = "none";
            }
            document.getElementById(box).style.display = vis;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                // alert(coupon);
                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
            });

        });
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(event) {
            event.preventDefault();
            var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            if (paymentMethod === 'midtrans') {
                var payButton = this;
                payButton.disabled = true;

                var form = document.getElementById('payment-form');
                var formData = new FormData(form);

                fetch('{{ route('cart.order') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                }).then(response => response.json()).then(data => {
                    if (data.snap_token) {
                        snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                window.location.href = '{{ route('payment.success') }}?order_id=' +
                                    result.order_id;
                            },
                            onPending: function(result) {
                                window.location.href = '{{ route('payment.success') }}?order_id=' +
                                    result.order_id;
                            },
                            onError: function(result) {
                                alert('Payment failed!');
                                payButton.disabled = false;
                            },
                            onClose: function() {
                                payButton.disabled = false;
                            }
                        });
                    } else {
                        alert('Something went wrong, please try again!');
                        payButton.disabled = false;
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong, please try again!');
                    payButton.disabled = false;xamp
                });
            } else {
                form.submit();
            }
        };
    </script>
@endpush
