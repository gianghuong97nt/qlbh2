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
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
            <a href="women.html"><div class="bb-left-agileits-w3layouts-inner">
                    <h3>SALE</h3>
                    <h4>upto<span>75%</span></h4>
                </div></a>
        </div>
        <div class="col-md-4 bb-grids bb-middle-agileits-w3layouts">
            <a href="shoes.html"><div class="bb-middle-top">
                    <h3>SALE</h3>
                    <h4>upto<span>55%</span></h4>
                </div></a>
            <a href="jewellery.html"><div class="bb-middle-bottom">
                    <h3>SALE</h3>
                    <h4>upto<span>65%</span></h4>
                </div></a>
        </div>
        <div class="col-md-3 bb-grids bb-right-agileits-w3layouts">
            <a href="watches.html"><div class="bb-right-top">
                    <h3>SALE</h3>
                    <h4>upto<span>50%</span></h4>
                </div></a>
            <a href="handbags.html"><div class="bb-right-bottom">
                    <h3>SALE</h3>
                    <h4>upto<span>60%</span></h4>
                </div></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script src="{{asset('frontend_assets/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('frontend_assets/js/horizontalTab.js')}}"></script>
@endsection
