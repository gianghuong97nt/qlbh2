@extends('admin.layouts.glance')

@section('title')
    {{ trans('admin.tilteAddProduct')}}
@endsection
@section('content')
    <h1>Thêm mới sản phẩm</h1>
    <div class="row">
        <div class="form-three widget-shadow">

            @if ( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form name="product" action="{{url('admin/product')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control1" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-8">
                        <select name="cat_id">
                            <option>Không có danh mục</option>
                            @foreach( $categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hãng</label>
                    <div class="col-sm-8">
                        <input type="text" name="brand" value="{{old('brand')}}" class="form-control1" placeholder="Nhập tên hãng">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Nhà cung cấp</label>
                    <div class="col-sm-8">
                        <input type="text" name="supplier" value="{{old('supplier')}}" class="form-control1" placeholder="Nhập nhà cung cấp">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" value="{{old('image')}}" class="form-control1" placeholder="Ảnh">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control1" placeholder="Nhập số lượng">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-8">
                        <input type="text" name="color" value="{{old('color')}}" class="form-control1" placeholder="Nhập màu sắc">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Size</label>
                    <div class="col-sm-8">
                        <input type="text" name="size" value="{{old('size')}}" class="form-control1" placeholder="Nhập kích cỡ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price Core</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceCore" value="{{old('priceCore')}}" class="form-control1" placeholder="Nhập giá bán thật (Interger)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price Sale</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceSale" value="{{old('priceSale')}}" class="form-control1" placeholder="Nhập giá giảm giá (Interger)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Note</label>
                    <div class="col-sm-8">
                        <textarea name="note" cols="50" rows="4" class="form-control1">{{old('note')}}</textarea>
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-default">ADD</button>
                </div>
            </form>
        </div>
    </div>
@endsection
