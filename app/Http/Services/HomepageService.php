<?php
namespace App\Http\Services;

use App\Model\Category;
use App\Model\Product;

class HomepageService {
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }
    
    public function getCategory() {
        return $this->category->all();
    }

    public function getProduct($cat_id) {
        return $this->product->where('cat_id', $cat_id)->get();
    }
}

