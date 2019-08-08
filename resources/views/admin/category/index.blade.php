@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.category.title') }}
@endsection
@section('style')
    <link href="{{asset('admin_assets/css/category.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('script')
    <script src="{{ asset('admin_assets/js/category.js') }}"></script>
@endsection
@section('content')
    <div class="forms tables">
        <div class="row">
            <div class="d-inline">
                <h2 class="title1">{{ trans('admin.category.title') }}</h2>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 btn-btn d-inline">
                <button type="button" class="btn btn-success btn-2" id="btn-search">{{ trans('admin.search') }}</button>
                <a href="{{'/admin'}}"><button type="button" class="btn btn-success btn-2 ">{{ trans('admin.back') }}</button></a>
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
                            <label class="form-control label-info">{{ trans('admin.category.category') }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <select id="id">
                                <option></option>
                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="table-result">
                <div id="">
                    <table class="table table-bordered tbl_category">
                        <thead>
                        <tr class="category">
                            <th class="tbl_id">{{ trans('admin.category.id') }} </th>
                            <th class="tbl_name">{{ trans('admin.category.name') }} </th>
                            <th class="tbl_image">{{ trans('admin.category.image') }}</th>
                            <th class="tbl_desc">{{ trans('admin.category.desc') }}</th>
                            <th class="tbl_intro">{{ trans('admin.category.intro') }}</th>
                            <th colspan="2"  class="action tbl_action"><a class="btn btn-primary" id="btn-add-row-1" href="{{url('admin/category/create')}}"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($categories) )
                            @foreach( $categories as $category )
                                <tr>
                                    <td>{{ isset($category->id) ? $category->id : '' }}</td>
                                    <td>{{ isset($category->name) ? $category->name : '' }}</td>
                                    <td>{{ isset($category->images) ? $category->images : '' }}</td>
                                    <td>{{ isset($category->desc) ? $category->desc: '' }}</td>
                                    <td>{{ isset($category->intro) ? $category->intro : '' }}</td>
                                    <td>
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning btn-update-row-1 d-inline" id="btn_update"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form name="category" action="{{url('admin/category/'.$category->id.'/delete')}}" method="post" class="form-horizontal">
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
