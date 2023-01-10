<?php

namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderInterface 
{
    public function getAllOrders() 
    {
        return Order::all();
    }

    public function getOrderById($orderId) 
    {
        return Order::findOrFail($orderId);
    }

    public function deleteOrder($orderId) 
    {
        Order::destroy($orderId);
    }

    public function createOrUpdateOrder($request, $method, $id = null)
    {
        $input = $request->only('date', 'project_id', 'supplier_id', 'total', 'paid', 'due', 'total_discount', 'discount_type', 'notes');
        // dd($request, $input);
        if($input['total'] == $input['paid']){
            $input['payment_status'] = 'paid';
        } else if($input['total'] == $input['due']){
            $input['payment_status'] = 'unpaid';
        } else {
            $input['payment_status'] = 'partially paid';
        }
        
        if($method == 'create'){
            $input['created_by'] = auth()->user()->id;
            $order = Order::create($input);
        } else {
            $order = Order::find($id);            
            $order->fill($input)->update();
        }
        $this->saveOrderDetails($order, $request);
    }


    public function getFulfilledOrders() 
    {
        return Order::where('is_fulfilled', true);
    }

    
    public function saveOrderDetails($order, $request)
    {
        if($request->deletedOrderDetailIDs){
            OrderDetail::whereIn('id',$request->deletedOrderDetailIDs)->delete();
        }
        foreach($request->details as $detail){
            $input['material_id'] = $detail['material_id'];
            $input['quantity'] = $detail['quantity'];
            $input['unit_price'] = $detail['unit_price'];
            $input['discount'] = $detail['discount'];
            $input['discount_type'] = $detail['discount_type'];
            $input['total'] = $detail['total'];
            $input['unit_id'] = $detail['unit_id'];
            $input['order_id'] = $order['id'];
            isset($detail['id']) ? OrderDetail::where('id', $detail['id'])->update($input) : OrderDetail::create($input);
        }
    }
}