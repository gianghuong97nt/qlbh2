<?php
namespace App\Http\Services;
use App\Model\Product;

class ProductService {
    protected $product;
    
    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function store($input) {
        return $this->product->create($input);
    }

    public function update($input) {
        return $this->product->update($input);
    }

    public function delete() {
        return $this->product->delete();
    }
    
    public function getProducts() {
        return $this->product->all();
    }
    
    public function getProduct($id) {
        return $this->product->find($id);
    }
}

