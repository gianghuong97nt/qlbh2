@extends('admin.layouts.glance')

@section('title')
    {{ trans('admin.addUser') }}
@endsection
@section('content')
    <h1>{{ trans('admin.addUser') }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            @if ( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                        @foreach ( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form name="user" action="{{ url('admin/user') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.name') }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control1" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.email') }}</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control1" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.role') }}</label>
                    <div class="col-sm-8">
                        <select name="role" style="height: 40px">
                            <option value="0"></option>
                            <option value="1">{{ trans('admin.administrator') }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.password') }}</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control1" placeholder="{{ trans('admin.password') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.comfirm_password') }}</label>
                    <div class="col-sm-8">
                        <input type="password" name="comfirm_password" value="{{ old('comfirm_password') }}" class="form-control1" placeholder="{{ trans('admin.comfirm_password') }}">
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-default">{{ trans('admin.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
