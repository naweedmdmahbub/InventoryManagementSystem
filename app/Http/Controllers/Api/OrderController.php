<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateOrderRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->orderRepository->createOrUpdateOrder($request, 'create');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateOrderRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->orderRepository->createOrUpdateOrder($request, 'update', $id);
            DB::commit();
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
        try {
            // DB::table("order_details")->where('order_id',$id)->delete();
            $order = Order::find($id);
            DB::beginTransaction();
            $order->orderDetails()->delete();
            $order->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (\Exception $ex) {
            DB::rollBack();
            response()->json(['error' => $ex->getMessage()], 403);
        }
    }


}
