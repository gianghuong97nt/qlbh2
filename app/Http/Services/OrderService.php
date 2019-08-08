<?php
namespace App\Http\Services;

use App\Model\Order;
use App\Model\OrderProduct;
use Cart;
use Illuminate\Support\Facades\DB;

class OrderService {
    protected $order;
    protected $orderProduct;

    public function __construct(Order $order, OrderProduct $orderProduct) {
        $this->order = $order;
        $this->orderProduct = $orderProduct;
    }
    
    public function getAllOrder() {
        return $this->order->paginate(config('config.paginate'));
    }
    
    public function getOrder($id) {
        return $this->order->find($id);
    }

    public function save($input) {
        DB::beginTransaction();

        try {
            $order = $this->order;
            $order->customer_name = $input['customer_name'];
            $order->customer_phone = $input['customer_phone'];
            $order->customer_email = $input['customer_email'];
            $order->customer_note = $input['customer_note'];
            $order->customer_address = $input['customer_address'];
            $order->customer_city = $input['customer_city'];
            $order->customer_country = $input['customer_country'];
            $order->total_price = Cart::getTotal();
            $order->status = 0;
            $order->save();
            $cartCollection = Cart::getContent();

            foreach ($cartCollection as $product) {
                $order_detail = $this->orderProduct;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $product->id;
                $order_detail->quantity = $product->quantity;
                $order_detail->unit_price = $product->price;
                $order_detail->total_price = $product->price * $product->quantity;
                $order_detail->status = 0;
                $order_detail->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }
    
    public function update($input, $id) {
        return $this->order->where('id', $id)->update(['status' => $input['status']]);
    }

    public function delete($id) {
        return $this->order->where('id', $id)->where('status', 1)->delete();
    }
    
    public function search($inputs) {
        $query = $this->order;
        foreach($inputs as $key => $value) {
            if(!is_null($value)) {
                $query = $query->where($key, 'like', '%'.$value.'%');
            }
        }

        return $query->paginate(config('config.paginate'));
    }
}
