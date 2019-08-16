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
                <tr style="height: 120px">
                    <td>{{ isset($category->id) ? $category->id : '' }}</td>
                    <td>{{ isset($category->name) ? $category->name : '' }}</td>
                    <td><img src="{{ asset('/storage/uploads/'.$category->images) }}"
                             style="max-width: 150px; max-height: 150px" alt="{{ $category->images }}"></td>
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
