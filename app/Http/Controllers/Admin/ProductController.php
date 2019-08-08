<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProduct;
use App\Http\Services\ProductService;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(ProductService $productService, CategoryService $categoryService) {
        $this->product = $productService;
        $this->category = $categoryService;
    }

    public function index() {
        $categories = $this->category->getALlCategory();
        $products = $this->product->getProducts();

        return view('admin.product.index', compact('products', 'categories'));
    }

    public function create() {
        $products = $this->product->getProducts();
        $categories = $this->category->getALlCategory();

        return view('admin.product.submit', compact('products', 'categories'));
    }

    public function edit($id) {
        $product = $this->product->getProduct($id);
        $categories = $this->category->getALlCategory();

        return view('admin.product.edit', compact('product','categories','id'));
    }
    
    public function store(RequestProduct $requestProduct) {
        $this->product->store($requestProduct->all());
        
        return redirect()->route('admin.product');
    }

    public function update($id, RequestProduct $requestProduct) {
        $this->product->update($requestProduct->all(), $id);

        return redirect()->route('admin.product');
    }

    public function destroy($id) {
        $this->product->getProduct($id)->delete();

        return redirect()->route('admin.product');
    }

    public function search(Request $request) {
        $input = $request->all();
        $products = $this->product->search($input);
        
        return view('admin.product.result', compact('products'));
    }
}
