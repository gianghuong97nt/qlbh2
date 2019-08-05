@extends('customer.layouts.electronic')
@section('title')
    giỏ hàng
@endsection
@section('style')
    <link href="{{asset('css/cart.css')}}" rel='stylesheet' type='text/css' />
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
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($cart_products as $product)
                            <tr class="rem{{ $i }} rem">
                                <td class="invert">{{ $i }}</td>
                                <?php
                                    $product_id = $product->id;
                                    $images = isset($products[$product_id]->images) ? ($products[$product_id]->images) : array();
                                ?>
                                <td class="invert-image"><a href="{{ url('product/'.$product_id) }}">
                                    <img src="{{ asset('/storage/uploads/'.$images) }}" style="max-width: 150px; max-height: 150px" class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus" data-id="{{ $product->id }}">&nbsp;</div>
                                            <div class="entry value">{{ $product->quantity }}</div>
                                            <div class="entry value-plus active" data-id="{{ $product->id }}">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{ $product->name }}</td>
                                <td class="invert">VND {{ number_format($product->price) }}</td>
                                <td class="invert">VND {{ number_format($product->price*$product->quantity) }}</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1" data-id="{{ $product->id }}"> Xóa </div>
                                        @csrf
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        <!--quantity-->
                        </tbody>
                    </table>
                </div>
                <div class="checkout-left">
                    <div class="checkout-left-basket">
                        <h4><a href="{{ url('/payment') }}" style="color: #FFF">Thanh toán</a></h4>
                        <ul>
                            @foreach($cart_products as $product)
                                <li>{{ $product->name }} <i>-</i> <span>VND {{ $product->price*$product->quantity }} </span></li>
                            @endforeach
                            <li>Tổng tiền <i>-</i> <span>VND {{ number_format($total_payment) }}</span></li>
                        </ul>
                    </div>
                    <div class="checkout-right-basket">
                        <a href="{{ url('/') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/close1.js')}}"></script>
@endsection
