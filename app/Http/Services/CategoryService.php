<?php
namespace App\Http\Services;
use App\Model\Category;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getALlCategory(){
        return   $this->category->all();
    }

    public function getCategories() {
        return $this->category->all();
    }

    public function getCategory($id) {
        return $this->category->find($id);
    }
    
    public function upload($inputs, $name)
    {
        if (!is_null($inputs)) {
            $nameFile =time() . '_' . $inputs->getClientOriginalName();
            $inputs->storeAs('public/uploads',$nameFile);

            return $nameFile;
        }
    }

    public function store($inputs) {
        $category = $this->category;

        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images'], $inputs['name']);
        } else {
            $image = 'default.png';
        }
        $category->name = $inputs['name'];
        $category->desc = $inputs['desc'];
        $category->intro = $inputs['intro'];
        $category->images = $image;

        return $category->save();
    }

    public function update($inputs,$id) {
        $category = $this->category->findOrFail($id);

        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images'], $inputs['name']);
        } else {
            $image = 'default.png';
        }
        $category->name = $inputs['name'];
        $category->desc = $inputs['desc'];
        $category->intro = $inputs['intro'];
        $category->images = $image;

        return $category->save();
    }

    public function delete($id) {
        return $this->category->where('id',$id)->delete();
    }
}
