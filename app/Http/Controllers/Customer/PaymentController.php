<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use App\Http\Services\ProductService;
use App\Http\Requests\OrderRequest;
use Cart;

class PaymentController extends Controller
{
    protected $order;
    protected $product;

    public function __construct(OrderService $orderService, ProductService $productService)
    {
        $this->order = $orderService;
        $this->product = $productService;
    }

    public function index() {
        $cart_products = Cart::getContent();
        $products = [];
        foreach ($cart_products as $p) {
            $pid = $p->id;
            $products[$pid] = $this->product->getProduct($pid);
        }
        $total_payment = Cart::getTotal();
        $total_qtt_cart = Cart::getTotalQuantity();

        return view('customer.payment.index',
            compact('cart_products', 'products', 'total_payment', 'total_qtt_cart'));
    }

    public function order(OrderRequest $orderRequest) {
        $input = $orderRequest->all();
        $this->order->save($input);
        Cart::clear();

        return redirect('payment/after');
    }

    public function afterOrder() {
        return view('customer.payment.success');
    }
}
