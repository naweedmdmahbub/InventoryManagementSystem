<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('project', 'supplier')->get();
        return OrderResource::collection($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateOrderRequest $request)
    {
        // dd($request->all());
        try{
            $input = $request->only('date', 'project_id', 'supplier_id', 'total', 'paid', 'due', 'total_discount', 'discount_type', 'notes');
            if($input['total'] == $input['paid']){
                $input['payment_status'] = 'paid';
            } else if($input['total'] == $input['due']){
                $input['payment_status'] = 'unpaid';
            } else {
                $input['payment_status'] = 'partially paid';
            }
            $input['created_by'] = auth()->user()->id;
            DB::beginTransaction();
            $order = Order::create($input);
            $this->saveOrderDetails($order, $request);
            DB::commit();
        } catch (Exception $ex){
            DB::rollBack();
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['orderDetails.material:id,name',
                            'orderDetails.unit:id,name', 
                            'project:id,name',
                            'supplier:id,first_name,last_name'])
                        ->find($id);
        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateOrderRequest $request, $id)
    {
        // dd($id, $request->all());
        try {
            $input = $request->only('date', 'project_id', 'supplier_id', 'total', 'paid', 'due', 'total_discount', 'discount_type', 'notes');
            $order = Order::find($id);
            DB::beginTransaction();
            $order->fill($input)->update();
            if($request->deletedOrderDetailIDs){
                DB::table("order_details")->whereIn('id',$request->deletedOrderDetailIDs)->delete();
            }
            $this->saveOrderDetails($order, $request);
            DB::commit();
            return new OrderResource($order);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json( new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]), 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveOrderDetails($order, $request)
    {
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
