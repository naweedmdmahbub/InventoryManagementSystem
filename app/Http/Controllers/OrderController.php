<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrderRequest;
use App\Models\Structure;
use App\Models\Unit;
use App\Models\Order;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Toastr;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('orders.view')) {
            abort(403, 'Unauthorized action.');
        }

        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('orders.create')) {
            abort(403, 'Unauthorized action.');
        }
        $structures = Structure::all();
        $units = Unit::all();

        $order = new Order();
        return view('orders.create', compact('order','structures','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateOrderRequest $request)
    {
        if (!auth()->user()->can('orders.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'description', 'structure_id', 'unit_id', 'price', 'rate', 'quantity');
            $input['created_by'] = auth()->user()->id;
            DB::beginTransaction();
            Order::create($input);
            Toastr::success('Order created successfully','Success');
            DB::commit();
            return redirect()->route('orders.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Order Create Failed');
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
        if (!auth()->user()->can('orders.view')) {
            abort(403, 'Unauthorized action.');
        }

        $order = Order::find($id);
        if (!$order){
            Toastr::warning('Order View Failed');
            return redirect('orders');
        }
        return view('orders.view', compact('order','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('orders.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $structures = Structure::all();
        $units = Unit::all();

        $order = Order::find($id);
        if (!$order){
            Toastr::warning('Order Edit Failed');
            return redirect('orders');
        }
        return view('orders.edit', compact('order','structures','units'));
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
        if (!auth()->user()->can('orders.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'description', 'structure_id', 'unit_id', 'price', 'rate', 'quantity');
            DB::beginTransaction();
            $order = Order::find($id);
            $order->fill($input)->update();
            Toastr::success('Order updated successfully','Success');
            DB::commit();
            return redirect()->route('orders.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Order Update Failed');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (!auth()->user()->can('orders.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $order = Order::find($id);
        $order->delete();
        Toastr::success('Order deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
