<?php
namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use Cart;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index() {
        $cart_products = Cart::getContent();
        $products = [];
        foreach ($cart_products as $p) {
            $pid = $p->id;
            $products[$pid] = $this->cartService->getProduct($pid);
        }
        $total_payment = Cart::getTotal();
        $total_qtt_cart = Cart::getTotalQuantity();

        return view('customer.cart.index',
            compact('cart_products', 'products', 'total_payment', 'total_qtt_cart'));
    }

    public function add(Request $request) {
        $input = $request->all();
        $product_id = (int) $input['w3ls1_item'];
        $quantity = (int) $input['add'];
        $product  = $this->cartService->getProduct($product_id);
        $response['status'] = 0;
        if (isset($product->id)) {
            Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->priceSale,
                'quantity' => $quantity,
                'attributes' => array()
            ));
            $response['status'] = 1;
            session()->save();
        }
        echo json_encode($response);
        exit;
    }
    /**
     * update to cart
     */
    public function update(Request $request) {
        $input = $request->all();
        $product_id = (int) $input['pid'];
        $qtt = (int) $input['quantity'];
        $product  = $this->cartService->getProduct($product_id);
        $response['status'] = 0;

        if (isset($product->id)) {
            Cart::update($product->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $qtt
                ),
            ));
            $response['status'] = 1;
            session()->save();
        }
        echo json_encode($response);
        exit;
    }
    /**
     * remove to cart
     */
    public function remove(Request $request) {
        $input = $request->all();
        $product_id = (int) $input['pid'];
        $product  = $this->cartService->getProduct($product_id);
        $response['status'] = 0;
        if (isset($product->id)) {
            Cart::remove($product->id);
            $response['status'] = 1;
            session()->save();
        }
        echo json_encode($response);
        exit;
    }
    /**
     * remove toàn bộ giỏ hàng
     */
    public function clear() {
        Cart::clear();
    }
}
