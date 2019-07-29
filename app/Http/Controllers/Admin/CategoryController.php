<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryService $categoryService) {
        $this->category = $categoryService;
    }

    public function index() {
        $categories = $this->category->getALlCategory();

        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.submit');
    }

    public function edit($id) {
        $category = $this->category->getCategory($id);

        return view('admin.category.edit', compact('category'));
    }

    public function store(CategoryRequest $categoryRequest) {
        $this->category->store($categoryRequest->input());

        return redirect('/admin/category');
    }

    public function update($id, CategoryRequest $categoryRequest) {
        $category = $this->category->getCategory($id);
        $category->update($categoryRequest->input());

        return redirect('/admin/category');
    }

    public function destroy($id) {
        $this->category->getCategory($id)->delete();

        return redirect('/admin/category');
    }
}
