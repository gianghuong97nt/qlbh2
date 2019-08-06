@extends('admin.layouts.glance')
@section('title')
    {{ trans('admin.user.list') }}
@endsection
@section('style')
    <link href="{{asset('admin_assets/css/user.css') }}" rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    <div class="forms tables">
        <div class="row">
            <div class="d-inline">
                <h2 class="title1">{{ trans('admin.user.list') }}</h2>
            </div>
        </div>
        <div class="panel-body bs-example widget-shadow" >
            <div id="table-result">
                <div id="">
                    <table class="table table-bordered tbl_user">
                        <thead>
                        <tr class="user">
                            <th class="tbl_id">{{ trans('admin.user.id') }} </th>
                            <th class="tbl_name">{{ trans('admin.user.name') }}</th>
                            <th class="tbl_email">{{ trans('admin.user.email') }}</th>
                            <th class="tbl_role">{{ trans('admin.user.role') }}</th>
                            <th class="tbl_address">{{ trans('admin.user.address') }}</th>
                            <th class="tbl_phone_number">{{ trans('admin.user.phone_number') }}</th>
                            <th class="tbl_gender">{{ trans('admin.user.gender') }}</th>
                            <th class="action tbl_action"><a class="btn btn-primary" id="btn-add-row-1" href="{{ url('admin/user/create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($users))
                            @foreach( $users as $user )
                                <tr>
                                    <td>{{ isset($user->id) ? $user->id : '' }}</td>
                                    <td>{{ isset($user->name) ? $user->name : '' }}</td>
                                    <td>{{ isset($user->email) ? $user->email : '' }}</td>
                                    <td>{{ isset($user->role) ? config('config.role.' . $user->role) : '' }}</td>
                                    <td>{{ isset($user->address) ? $user->address : '' }}</td>
                                    <td>{{ isset($user->phone_number) ? $user->phone_number : '' }}</td>
                                    <td>{{ isset($user->gender) ? $user->gender : '' }}</td>
                                    <td>
                                        <form name="product" action="{{ url('admin/user/'.$user->id.'/delete') }}" method="post" class="form-horizontal">
                                            @csrf
                                            <div class="action">
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
            </div>
        </div>
    </div>
@endsection
