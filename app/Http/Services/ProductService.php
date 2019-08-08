<?php
namespace App\Http\Services;
use App\Model\Product;

class ProductService {
    protected $product;
    
    public function __construct(Product $product) {
        $this->product = $product;
    }
    
    public function update($inputs, $id) {
        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images'], $inputs['name']);
            $inputs['images'] = $image;
        }

        return $this->product->where('id', $id)->firstOrFail()->update($inputs);
    }

    public function delete() {
        return $this->product->delete();
    }
    
    public function getProducts() {
        return $this->product->paginate(config('config.paginate'));
    }
    
    public function getProduct($id) {
        return $this->product->find($id);
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
        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images'], $inputs['name']);
            $inputs['images'] = $image;
        }

        return $this->product->create($inputs);
    }

    public function search($inputs) {
        $query = $this->product;
        foreach($inputs as $key => $value){
            if(!is_null($value)) {
                $query = $query->where($key, 'like', '%'.$value.'%');
            }
        }

        return $query->paginate(config('config.paginate'));
    }
}
