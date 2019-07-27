<?php
namespace App\Http\Services;
use App\Model\Category;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getCategories() {
        return $categories = $this->category->all();
    }
}

