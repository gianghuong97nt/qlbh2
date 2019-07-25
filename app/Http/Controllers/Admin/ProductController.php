<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ValidateProduct;
use App\Http\Services\ProductService;
use App\Http\Services\CategoryService;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(ProductService $productService, CategoryService $categoryService) {
        $this->product = $productService;
        $this->category = $categoryService;
    }

    public function index(ProductService $service) {
        $data = [];
        $data['products'] = $service->getProducts();

        return view('admin.product.index', $data);
    }

    public function create() {
        $products = $this->product->getProducts();
        $categories = $this->category->getCategories();

        return view('admin.product.submit', compact('products', 'categories'));
    }

    public function edit($id) {
        $data = [];
        $data['product'] = $this->product->getProduct($id);
        $data['categories'] = $this->category->getCategories();
        $data['id'] = $id;

        return view('admin.product.edit', $data);
    }
    
    public function store(ValidateProduct $validate, Request $request) {
        $validate->product($request);
        $input = $request->except('_token');
        $this->product->store($input);
        
        return redirect()->route('admin.product');
    }

    public function update($id, Request $request, ValidateProduct $validate) {
        $validate->product($request);
        $input = $request->except('_token');
        $this->product = $this->product->getProduct($id);
        $this->product->update($input);

        return redirect()->route('admin.product');
    }

    public function destroy($id) {
        $this->product->getProduct($id)->delete();

        return redirect()->route('admin.product');
    }
}

