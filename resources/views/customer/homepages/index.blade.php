@extends('customer.layouts.electronic')
@section('title')
    {{ trans('admin.homepage.home') }}
@endsection
@section('content')
<div class="banner-agile">
    <div class="container">
        <h2>{{ trans('admin.homepage.welcome') }}</h2>
        <h3>{{ trans('admin.homepage.name') }}</h3>
    </div>
</div>
<div class="container">
    <div class="top-products">
        <div class="container">
            <h3>{{ trans('admin.topproduct')}}</h3>
            <div class="sap_tabs">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        @foreach($categories as $category)
                            <a class="load" data-category_id="{{ $category['id'] }}"><li class="resp-tab-item {{ ($category['id'] == $id) ? 'resp-tab-active' : '' }}"><span>{{ $category['name'] }}</span></li></a>
                        @endforeach
                    </ul>
                    <div class="resp-tabs-container">
                        <div id="result">
                            @if ( isset($products))
                                @foreach($products as $product)
                                    <div class="col-md-3 top-product-grids tp1 animated wow slideInUp" data-wow-delay=".5s">
                                        <a href="#">
                                            <div class="product-img">
                                                <img src="{{asset('/storage/uploads/'.$product['images'])}}" alt="" style="width: 235px; height: 235px"/>
                                                <div class="p-mask">
                                                    <form action="{{ url('cart/add') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls1_item" value="{{ $product->id }}" />
                                                        <input type="hidden" name="amount" value="{{ $product->priceSale }}" />
                                                        <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </a>
                                        <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                        <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                        <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                        <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                        <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                        <h4>{{ $product['name'] }}</h4>
                                        <h5>{{ $product['priceSale'] }}</h5>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('frontend_assets/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('frontend_assets/js/horizontalTab.js')}}"></script>
<script type="text/javascript" src="{{asset('js/load_product.js')}}"></script>
@endsection
