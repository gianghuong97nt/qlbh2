<div id="result">
    <table class="table table-bordered tbl_product">
        <thead>
        <tr class="product">
            <th class="tbl_id">{{ trans('admin.product.id')}} </th>
            <th class="tbl_name">{{ trans('admin.product.name')}} </th>
            <th class="tbl_brand">{{ trans('admin.product.brand')}}</th>
            <th class="tbl_supplier">{{ trans('admin.product.supplier')}}</th>
            <th class="tbl_quantity">{{ trans('admin.product.quantity')}} </th>
            <th class="tbl_color">{{ trans('admin.product.color')}}</th>
            <th class="tbl_size">{{ trans('admin.product.size')}}</th>
            <th class="tbl_price_core">{{ trans('admin.product.priceCore')}}</th>
            <th class="tbl_price_sale">{{ trans('admin.product.priceSale')}}</th>
            <th class="tbl_note">{{ trans('admin.product.note')}}</th>
            <th colspan="2"  class="action tbl_action"><a class="btn btn-primary" id="btn-add-row-1" href="{{url('admin/product/create')}}"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
        </tr>
        </thead>
        <tbody>
        @if( isset($products) )
            @foreach( $products as $product )
                <tr>
                    <td>{{ isset($product->id) ? $product->id : '' }}</td>
                    <td>{{ isset($product->name) ? $product->name : '' }}</td>
                    <td>{{ isset($product->brand) ? $product->brand : '' }}</td>
                    <td>{{ isset($product->supplier) ? $product->supplier: '' }}</td>
                    <td>{{ isset($product->quantity) ? $product->quantity : '' }}</td>
                    <td>{{ isset($product->color) ? $product->color : '' }}</td>
                    <td>{{ isset($product->size) ? $product->size : '' }}</td>
                    <td>{{ isset($product->priceCore) ? number_format($product->priceCore) : '' }}</td>
                    <td>{{ isset($product->priceSale) ? number_format($product->priceSale) : '' }}</td>
                    <td>{{ isset($product->note) ? $product->note : '' }}</td>
                    <td>
                        <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-warning btn-update-row-1 d-inline" id="btn_update"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                        <form name="product" action="{{url('admin/product/'.$product->id.'/delete')}}" method="post" class="form-horizontal">
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
{{ $products->links() }}
