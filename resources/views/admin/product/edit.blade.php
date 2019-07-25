@extends('admin.layouts.glance')

@section('title')
    Sửa sản phẩm
@endsection
@section('content')
    <h1>Sửa sản phẩm </h1>
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
            <form name="product" action="{{url('admin/product/edit')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-8">
                        <select name="cat_id">
                            <option value="0">Không có danh mục</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hãng</label>
                    <div class="col-sm-8">
                        <input type="text" name="brand"  class="form-control1" id="focusedinput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Nhà cung cấp</label>
                    <div class="col-sm-8">
                        <input type="text" name="supplier"  class="form-control1" id="focusedinput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <input type="text" name="images"  class="form-control1" id="focusedinput" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="text" name="quantity"  class="form-control1" id="focusedinput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-8">
                        <input type="text" name="color"  class="form-control1" id="focusedinput" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Size</label>
                    <div class="col-sm-8">
                        <input type="text" name="size"  class="form-control1" id="focusedinput" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price Core</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceCore"  class="form-control1" id="focusedinput" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price Sale</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceSale"  class="form-control1" id="focusedinput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Note</label>
                    <div class="col-sm-8">
                        <textarea name="note" cols="50" rows="4" class="form-control1"></textarea>
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </form>
        </div>
    </div>
@endsection