<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateWorkRequest;
use App\Models\Structure;
use App\Models\Unit;
use App\Models\Work;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Toastr;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('works.view')) {
            abort(403, 'Unauthorized action.');
        }

        $works = Work::all();
        return view('works.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('works.create')) {
            abort(403, 'Unauthorized action.');
        }
        $structures = Structure::all();
        $units = Unit::all();

        $work = new Work();
        return view('works.create', compact('work','structures','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateWorkRequest $request)
    {
        if (!auth()->user()->can('works.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'description', 'structure_id', 'unit_id', 'price', 'rate', 'quantity');
            $input['created_by'] = auth()->user()->id;
            DB::beginTransaction();
            Work::create($input);
            Toastr::success('Work created successfully','Success');
            DB::commit();
            return redirect()->route('works.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Work Create Failed');
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
        if (!auth()->user()->can('works.view')) {
            abort(403, 'Unauthorized action.');
        }

        $work = Work::find($id);
        if (!$work){
            Toastr::warning('Work View Failed');
            return redirect('works');
        }
        return view('works.view', compact('work','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('works.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $structures = Structure::all();
        $units = Unit::all();

        $work = Work::find($id);
        if (!$work){
            Toastr::warning('Work Edit Failed');
            return redirect('works');
        }
        return view('works.edit', compact('work','structures','units'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateWorkRequest $request, $id)
    {
        if (!auth()->user()->can('works.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'description', 'structure_id', 'unit_id', 'price', 'rate', 'quantity');
            DB::beginTransaction();
            $work = Work::find($id);
            $work->fill($input)->update();
            Toastr::success('Work updated successfully','Success');
            DB::commit();
            return redirect()->route('works.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Work Update Failed');
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
        if (!auth()->user()->can('works.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $work = Work::find($id);
        $work->delete();
        Toastr::success('Work deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
