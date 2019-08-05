@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.order.index')}}
@endsection
@section('style')
    <link href="{{asset('admin_assets/css/order.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <div class="forms tables">
        <div class="row">
            <div class="d-inline">
                <h2 class="title1">{{ trans('admin.order.index')}}</h2>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 btn-btn d-inline">
                <button type="button" class="btn btn-success btn-2" id="btn-search">{{ trans('admin.search')}}</button>
                <a href="{{'admin/'}}"><button type="button" class="btn btn-success btn-2 ">{{ trans('admin.back')}}</button></a>
            </div>
        </div>
        <div class="panel-body bs-example widget-shadow" >
            <div class="form-grids row widget-shadow" id="condition_search">
                <div class="condition">
                    <p style="color: white">{{ trans('admin.conditionSearch')}}
                    </p>
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.order.name')}}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  class="form-control" id="" maxlength="20"/>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.order.phonenumber')}}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="" maxlength="20"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.order.email')}}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="number"  class="form-control" id="" maxlength="20"/>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label class="form-control label-info">{{ trans('admin.order.address')}}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="" maxlength="50"/>
                        </div>
                    </div>
                </div>
            </div>
            <div id="table-result">
                <div id="">
                    <table class="table table-bordered tbl_order">
                        <thead>
                        <tr class="order">
                            <th class="tbl_id">{{ trans('admin.order.id')}} </th>
                            <th class="tbl_name">{{ trans('admin.order.name')}} </th>
                            <th class="tbl_phonenumber">{{ trans('admin.order.phonenumber')}}</th>
                            <th class="tbl_email">{{ trans('admin.order.email')}}</th>
                            <th class="tbl_address">{{ trans('admin.order.address')}}</th>
                            <th class="tbl_total_price">{{ trans('admin.order.total_price')}}</th>
                            <th class="tbl_note">{{ trans('admin.order.note')}}</th>
                            <th class="tbl_status">{{ trans('admin.order.status')}}</th>
                            <th colspan="2"  class="action tbl_action">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($orders) )
                            @foreach( $orders as $order )
                                <tr>
                                    <td>{{ isset($order->id) ? $order->id : '' }}</td>
                                    <td>{{ isset($order->customer_name) ? $order->customer_name : '' }}</td>
                                    <td>{{ isset($order->customer_phone) ? $order->customer_phone : '' }}</td>
                                    <td>{{ isset($order->customer_email) ? $order->customer_email: '' }}</td>
                                    <td>{{ isset($order->customer_address) ? $order->customer_address: '' }}</td>
                                    <td>{{ isset($order->total_price) ? $order->total_price: '' }}</td>
                                    <td>{{ isset($order->customer_note) ? $order->customer_note : '' }}</td>
                                    <td>{{ isset($order->status) ? config('config.status.' . $order->status) : '' }}</td>
                                    <td>
                                        <a href="{{url('admin/order/'.$order->id.'/edit')}}" class="btn btn-warning btn-update-row-1 d-inline" id="btn_update"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form name="order" action="{{url('admin/order/'.$order->id.'/delete')}}" method="post" class="form-horizontal">
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
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
