@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.profile')}}
@endsection
@section('content')
    <h1> {{ trans('admin.profile')}} </h1>
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
            <form name="pre" enctype="multipart/form-data" action="{{ url('admin/profile') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.name')}}</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control1" placeholder="{{ trans('admin.name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.email')}}</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control1" placeholder="{{ trans('admin.email')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.phone_number')}}</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" class="form-control1" placeholder="{{ trans('admin.phone_number')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.gender')}}</label>
                    <div class="col-sm-8">
                        <select name="gender">
                            <option {{ Auth::user()->gender == 0 ? 'selected' : '' }} value="0">Male</option>
                            <option {{ Auth::user()->gender == 1 ? 'selected' : '' }} value="1">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.address')}}</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control1" placeholder="{{ trans('admin.address')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label ">{{ trans('admin.birthday')}}</label>
                    <div class="col-sm-8">
                        <input type="date" name="birthday" value="{{ Auth::user()->birthday }}" class="form-control1" placeholder="{{ trans('admin.birthday')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label ">{{ trans('admin.avatar')}}</label>
                    <div class="col-sm-8">
                        <img src="{{isset(Auth::user()->avatar) && Auth::user()->avatar != "" ?
                       asset('/storage/avatars/'.Auth::user()->avatar) : asset('uploads/default.png') }}" style="height: 150px; width: 150px">
                        <input type="file" name="avatar" value="{{ Auth::user()->avatar }}">
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
