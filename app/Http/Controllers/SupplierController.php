<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('users.view')) {
            abort(403, 'Unauthorized action.');
        }

        $suppliers = Supplier::all();
        return view('suppliers.index',compact('suppliers'));
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('users.create')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier = new Supplier();
        return view('suppliers.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('users.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('first_name', 'last_name', 'business_name', 'email', 'contact_person', 'contact_no', 'address');
            DB::beginTransaction();
            Supplier::create($input);
            Toastr::success('Supplier created successfully','Success');
            DB::commit();
            return redirect()->route('suppliers.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Supplier Create Failed');
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
        if (!auth()->user()->can('users.view')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier = Supplier::find($id);
        return view('suppliers.view', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('users.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier = Supplier::find($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('users.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('first_name', 'last_name', 'business_name', 'email', 'contact_person', 'contact_no', 'address');
            DB::beginTransaction();
            $supplier = Supplier::find($id);
            $supplier->fill($input)->update();
            Toastr::success('Supplier updated successfully','Success');
            DB::commit();
            return redirect()->route('suppliers.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Supplier Update Failed');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
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


    public function delete($id)
    {
        if (!auth()->user()->can('users.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier = Supplier::find($id);
        $supplier->delete();
        Toastr::success('Supplier deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
