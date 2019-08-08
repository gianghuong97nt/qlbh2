@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.category.add') }}
@endsection
@section('script')
    <script src="{{ asset('admin_assets/js/images.js') }}"></script>
@endsection
@section('content')
    <h1> {{ trans('admin.category.add') }} </h1>
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
            <form name="category" enctype="multipart/form-data" action="{{ url('admin/category') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.category.name') }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control1" placeholder="{{ trans('admin.category.name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('admin.category.image') }}</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('uploads/default.png') }}" style="height: 150px; width: 150px">
                        <input type="file" name="images">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label ">{{ trans('admin.category.intro') }}</label>
                    <div class="col-sm-8">
                        <textarea name="intro"  cols="50" rows="4" class="form-control1 mytinymce">{{ old('intro') }}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">{{ trans('admin.category.desc')}}</label>
                    <div class="col-sm-8">
                        <textarea name="desc"  cols="50" rows="4" class="form-control1 mytinymce"></textarea>{{ old('desc') }}</div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">{{ trans('admin.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
