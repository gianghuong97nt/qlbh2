@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.category.edit') }}
@endsection
@section('script')
    <script src="{{ asset('admin_assets/js/images.js') }}"></script>
@endsection
@section('content')
    <h1> {{ trans('admin.category.edit') }} {{ $category->id . ' : ' .$category->name }}</h1>
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
            <form name="category" enctype="multipart/form-data" action="{{ url('admin/category/'.$category->id) }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.category.name') }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1"  value="{{ isset($category->name) ?  $category->name : '' }}" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('admin.category.image')}}</label>
                    <div class="col-sm-8">
                        <img src="{{isset($category->images) ?
                       asset('/storage/uploads/'.$category->images) : asset('uploads/default.png') }}" style="height: 150px; width: 150px">
                        <input type="file" name="images" value="{{ $category->images }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">{{ trans('admin.category.intro') }}</label>
                    <div class="col-sm-8">
                        <textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ isset($category->intro) ?  $category->intro : '' }}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">{{ trans('admin.category.desc') }}</label>
                    <div class="col-sm-8">
                        <textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ isset($category->desc) ?  $category->desc : '' }}</textarea></div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">{{ trans('admin.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
