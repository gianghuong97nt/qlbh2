<?php
namespace App\Http\Services;
use App\Model\Category;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getALlCategory(){
        return   $this->category->paginate(config('config.paginate'));
    }
    
    public function getCategory($id) {
        return $this->category->find($id);
    }
    
    public function upload($inputs)
    {
        if (!is_null($inputs)) {
            $nameFile =time() . '_' . $inputs->getClientOriginalName();
            $inputs->storeAs('public/uploads',$nameFile);

            return $nameFile;
        }
    }

    public function store($inputs) {
        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images']);
            $inputs['images'] = $image;
        }

        return $this->category->create($inputs);
    }

    public function update($inputs,$id) {
        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images']);
            $inputs['images'] = $image;
        }

        return $this->category->where('id', $id)->firstOrFail()->update($inputs);
    }

    public function delete($id) {
        return $this->category->where('id',$id)->delete();
    }
    
    public function search ($inputs) {
        $query = $this->category;
        foreach($inputs as $key => $value) {
            if(!is_null($value)) {
                $query = $query->where($key, 'like', '%'.$value.'%');
            }
        }

        return $query->paginate(config('config.paginate'));
    }
}
