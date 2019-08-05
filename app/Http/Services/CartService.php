<?php
namespace App\Http\Services;

use App\Model\Product;

class CartService {
    protected $cart;

    public function __construct(Product $cart) {
        $this->cart = $cart;
    }

    public function getProduct($id){
        return $this->cart->find($id);
    }
}
