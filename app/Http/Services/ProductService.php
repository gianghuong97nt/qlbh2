<?php
namespace App\Http\Services;
use App\Model\Product;

class ProductService {
    protected $product;
    
    public function __construct(Product $product) {
        $this->product = $product;
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
    public function upload($inputs, $name)
    {
        if (!is_null($inputs)) {
            $nameFile =time() . '_' . $inputs->getClientOriginalName();

            $inputs->storeAs('public/uploads',$nameFile);
            return $nameFile;
        }
    }

    public function store($inputs) {
        $product = $this->product;

        if (isset($inputs['images'])) {
            $image = $this->upload($inputs['images'], $inputs['name']);
        } else {
            $image = 'default.png';
        }
        $product->name = $inputs['name'];
        $product->cat_id = $inputs['cat_id'];
        $product->brand = $inputs['brand'];
        $product->supplier = $inputs['supplier'];
        $product->quantity = $inputs['quantity'];
        $product->color = $inputs['color'];
        $product->size = $inputs['size'];
        $product->priceCore = $inputs['priceCore'];
        $product->priceSale = $inputs['priceSale'];
        $product->note = $inputs['note'];
        $product->images = $image;

        return $product->save();
    }
}

