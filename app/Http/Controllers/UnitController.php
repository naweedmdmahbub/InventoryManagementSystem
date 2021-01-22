<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Exception;
use Illuminate\Support\Facades\DB;
use Toastr;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('units.view')) {
            abort(403, 'Unauthorized action.');
        }

        $units = Unit::all();
        return view('units.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('units.create')) {
            abort(403, 'Unauthorized action.');
        }

        $unit = new Unit();
        return view('units.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('units.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'note', 'code');
            DB::beginTransaction();
            Unit::create($input);
            Toastr::success('Unit created successfully','Success');
            DB::commit();
            return redirect()->route('units.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Unit Create Failed');
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
        if (!auth()->user()->can('units.view')) {
            abort(403, 'Unauthorized action.');
        }

        $unit = Unit::find($id);
        return view('units.view', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('units.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $unit = Unit::find($id);
        return view('units.edit', compact('unit'));
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
        if (!auth()->user()->can('units.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'note', 'code');
            DB::beginTransaction();
            $unit = Unit::find($id);
            $unit->fill($input)->update();
            Toastr::success('Unit updated successfully','Success');
            DB::commit();
            return redirect()->route('units.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Unit Update Failed');
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
        if (!auth()->user()->can('units.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $unit = Unit::find($id);
        $unit->delete();
        Toastr::success('Unit deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
