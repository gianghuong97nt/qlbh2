@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.password.change') }}
@endsection
@section('style')
    <link href="{{asset('admin_assets/css/password.css')}}" rel='stylesheet' type='text/css'/>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('admin_assets/js/password.js')}}"></script>
@endsection
@section('content')
    <h1>  {{ trans('admin.password.change') }} </h1>
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(\Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ \Session::get('error') }}</li>
                        </ul>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ \Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
            <div class="col-sm-4">
                <form name="password" action="{{ url('admin/password') }}" method="post" class="form-horizontal">
                    @csrf
                    <label>{{ trans('admin.password.current') }}</label>
                    <div class="form-group pass_show">
                        <input type="password" name="current" value="{{ old('current') }}" class="form-control" placeholder="{{ trans('admin.password.current') }}">
                    </div>
                    <label>{{ trans('admin.password.new') }}</label>
                    <div class="form-group pass_show">
                        <input type="password" name="new" value="{{ old('new') }}" class="form-control" placeholder="{{ trans('admin.password.new') }}">
                    </div>
                    <label>{{ trans('admin.password.confirm') }}</label>
                    <div class="form-group pass_show">
                        <input type="password" name="confirm" value="{{ old('confirm') }}" class="form-control" placeholder="{{ trans('admin.password.confirm') }}">
                    </div>
                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-success">{{ trans('admin.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
