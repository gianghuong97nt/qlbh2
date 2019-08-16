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
