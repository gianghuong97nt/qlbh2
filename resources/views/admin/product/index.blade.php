@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.product.title') }}
@endsection
@section('style')
    <link href="{{asset('admin_assets/css/table_product.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('admin_assets/css/product.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('script')
    <script src="{{ asset('admin_assets/js/product.js') }}"></script>
@endsection
@section('content')
    <div class="forms tables">
        <div class="row">
            <div class="d-inline">
                <h2 class="title1">{{ trans('admin.product.title') }}</h2>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 btn-btn d-inline">
                <button type="button" class="btn btn-success btn-2" id="btn-search">Search</button>
                <a href="{{'admin/'}}"><button type="button" class="btn btn-success btn-2 ">Back</button></a>
            </div>
        </div>
        <div class="panel-body bs-example widget-shadow" >
            <div class="form-grids row widget-shadow" id="condition_search">
                <div class="condition">
                    <p style="color: white">{{ trans('admin.conditionSearch') }}
                    </p>
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.id') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="number"  class="form-control" id="id" />
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.brand') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="brand" maxlength="20"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.category') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <select id="cat_id">
                                <option value="">Không có danh mục</option>
                                @foreach( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.size') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="size" maxlength="20"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.name') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="name" maxlength="20"/>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.color') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="color" maxlength="20"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.product.supplier') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="supplier" maxlength="20"/>
                        </div>
                    </div>
                </div>
            </div>

            <div id="table-result">
                <div id="result">
                    <table class="table table-bordered tbl_product">
                        <thead>
                        <tr class="product">
                            <th class="tbl_id">{{ trans('admin.product.id') }} </th>
                            <th class="tbl_name">{{ trans('admin.product.name') }} </th>
                            <th class="tbl_brand">{{ trans('admin.product.brand') }}</th>
                            <th class="tbl_supplier">{{ trans('admin.product.supplier') }}</th>
                            <th class="tbl_quantity">{{ trans('admin.product.quantity') }} </th>
                            <th class="tbl_color">{{ trans('admin.product.color') }}</th>
                            <th class="tbl_size">{{ trans('admin.product.size') }}</th>
                            <th class="tbl_price_core">{{ trans('admin.product.priceCore') }}</th>
                            <th class="tbl_price_sale">{{ trans('admin.product.priceSale') }}</th>
                            <th class="tbl_note">{{ trans('admin.product.note') }}</th>
                            <th colspan="2"  class="action tbl_action"><a class="btn btn-primary" id="btn-add-row-1" href="{{url('admin/product/create')}}"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($products) )
                            @foreach( $products as $product )
                                <tr>
                                    <td>{{ isset($product->id) ? $product->id : '' }}</td>
                                    <td>{{ isset($product->name) ? $product->name : '' }}</td>
                                    <td>{{ isset($product->brand) ? $product->brand : '' }}</td>
                                    <td>{{ isset($product->supplier) ? $product->supplier: '' }}</td>
                                    <td>{{ isset($product->quantity) ? $product->quantity : '' }}</td>
                                    <td>{{ isset($product->color) ? $product->color : '' }}</td>
                                    <td>{{ isset($product->size) ? $product->size : '' }}</td>
                                    <td>{{ isset($product->priceCore) ? number_format($product->priceCore) : '' }}</td>
                                    <td>{{ isset($product->priceSale) ? number_format($product->priceSale) : '' }}</td>
                                    <td>{{ isset($product->note) ? $product->note : '' }}</td>
                                    <td>
                                        <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-warning btn-update-row-1 d-inline" id="btn_update"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form name="product" action="{{url('admin/product/'.$product->id.'/delete')}}" method="post" class="form-horizontal">
                                            @csrf

                                            <div class="col-sm-offset-2">
                                                <button type="submit" class="btn btn-danger btn-remove-row-1 d-inline"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
