@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.titleAddCategory')}}
@endsection
@section('script')
    <script src="{{ asset('admin_assets/js/images.js') }}"></script>
@endsection
@section('content')
    <h1> {{ trans('admin.titleAddCategory')}} </h1>
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
                    <label for="focusedinput" class="col-sm-2 control-label">{{ trans('admin.categoryName')}}</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control1" placeholder="{{ trans('admin.categoryName')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('admin.categoryImage')}}</label>
                    <div class="col-sm-8">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div style="" id="image">
                                <img style="width: 100%; height: 100%; margin-left: 0px"
                                     id="preview_image" src="{{ asset('uploads/default.png') }}" />
                                <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                            </div>
                            <p>
                                <a href="javascript:changeProfile()" style="text-decoration: none;">
                                    <i class="glyphicon glyphicon-edit"></i> {{ trans('admin.changeImage')}}
                                </a>&nbsp;&nbsp;
                                <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    {{ trans('admin.deleteImage')}}
                                </a>
                            </p>
                            <input type="file" id="file" style="display: none"/>
                            <input type="hidden" id="file_name" name="images" value="{{ 'default.png' }}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label ">{{ trans('admin.categoryIntro')}}</label>
                    <div class="col-sm-8">
                        <textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('intro') }}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">{{ trans('admin.categoryDesc')}}</label>
                    <div class="col-sm-8">
                        <textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce"></textarea>{{ old('desc') }}</div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
