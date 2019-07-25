<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopProductModel;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        return view('admin.product.submit');

    }

    public function edit(){
        return view('admin.product.edit');

    }

    public function delete(){
        return view('admin.product.delete');

    }

    public function store(){
        return redirect('/admin/product');
    }

    public function update(){
        return redirect('/admin/product');
    }

    public function destroy(){
        return redirect('/admin/product');
    }
}
