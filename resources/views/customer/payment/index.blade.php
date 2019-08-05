@extends('customer.layouts.electronic')
@section('title')
    Thanh toán
@endsection
@section('style')
    <link href="{{asset('css/payment.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <div id="custom-cart">
        <div class="checkout">
            <div class="container">
                <h3>Your shopping cart contains: <span>{{ $total_qtt_cart }} Products</span></h3>
                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Giá SP</th>
                            <th>Giá SL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($cart_products as $product)
                            <tr class="rem{{ $i }}">
                            <td class="invert">{{ $i }}</td>
                                <?php
                                    $product_id = $product->id;
                                    $images = isset($products[$product_id]->images) ? ($products[$product_id]->images) : array();
                                ?>
                                <td class="invert-image">
                                    <a href="{{ url('product/'.$product_id) }}">
                                        <img src="{{ asset('/storage/uploads/'.$images) }}" style="max-width: 150px; max-height: 150px" class="img-responsive">
                                    </a>
                                </td>
                            <td class="invert">
                                {{ $product->quantity }}
                            </td>
                            <td class="invert">{{ $product->name }}</td>
                            <td class="invert">VND {{ number_format($product->price) }}</td>
                            <td class="invert">VND {{ number_format($product->price*$product->quantity) }}</td>
                        </tr>
                        @endforeach
                        <!--quantity-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <h1>VND <?php echo number_format($total_payment) ?></h1>
    <div id="w3payment">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form name="order_form" action="{{ url('payment') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname"><i class="fa fa-user"></i> Tên</label>
                                <input type="text" id="fname" name="customer_name" placeholder="John M. Doe">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="customer_email" placeholder="john@example.com">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">Quốc gia</label>
                                        <input type="text" id="customer_country" name="customer_country" placeholder="VN">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">SDT</label>
                                        <input type="text" id="customer_phone" name="customer_phone" placeholder="0981234567">
                                    </div>
                                </div>
                            </div>
                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <label for="adr"><i class="fa fa-address-card-o"></i> ĐC</label>
                                <input type="text" id="adr" name="customer_address" placeholder="542 W. 15th Street">
                                <label for="city"><i class="fa fa-institution"></i> TP</label>
                                <input type="text" id="city" name="customer_city" placeholder="New York">
                            </div>
                        </div>
                        <div>
                            <label>Ghi chú</label>
                            <textarea name="customer_note" rows="10" style="width: 100%"></textarea>
                        </div>
                        <input type="submit" value="Continue to checkout" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
