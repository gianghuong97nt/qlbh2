<?php
namespace App\Http\Services;
use App\Model\Category;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getALlCategory(){
        return   $this->category->paginate(10);
    }

    public function getCategories() {
        return $this->category->all();
    }

    public function getCategory($id) {
        return $this->category->find($id);
    }

    public function store($input) {
        return $this->category->create($input);
    }

    public function update($input) {
        return $this->category->update($input);
    }

    public function delete() {
        return $this->category->delete();
    }
}
