@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.order.edit') }}
@endsection
@section('content')
    <h1> {{ trans('admin.order.edit') }} {{ $order->id }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form name="order" enctype="multipart/form-data" action="{{ url('admin/order/'.$order->id) }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.order.status') }}</label>
                    <div class="col-sm-8">
                        <select name="status">
                            <option {{ $order->status == 0 ? 'selected' : '' }} value="0">{{ trans('admin.order.unfinished') }}</option>
                            <option {{ $order->status == 1 ? 'selected' : '' }} value="1">{{ trans('admin.order.delivered') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">{{ trans('admin.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
