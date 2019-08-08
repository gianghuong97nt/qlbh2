<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;
    
    public function __construct(OrderService $orderService) {
        $this->order = $orderService;
    }

    public function index() {
        $orders = $this->order->getAllOrder();

        return view('admin.order.index', compact('orders'));
    }

    public function edit($id) {
        $order = $this->order->getOrder($id);

        return view('admin.order.edit', compact('order', 'id'));
    }

    public function update($id, Request $request) {
        $this->order->update($request->all(),$id);

        return redirect()->route('admin.order');
    }

    public function destroy($id) {
        $this->order->delete($id);

        return redirect()->route('admin.order');
    }

    public function search(Request $request) {
        $inputs = $request->all();
        $orders = $this->order->search($inputs);
        
        return view('admin.order.result', compact('orders'));
    }
}
