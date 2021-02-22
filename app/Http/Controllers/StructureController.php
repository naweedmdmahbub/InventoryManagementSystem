<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Structure;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Toastr;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('structures.view')) {
            abort(403, 'Unauthorized action.');
        }

        $structures = Structure::all();
        return view('structures.index',compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('structures.create')) {
            abort(403, 'Unauthorized action.');
        }
        $projects = Project::all();

        $structure = new Structure();
        return view('structures.create', compact('structure','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('structures.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'description', 'project_id');
            $input['created_by'] = auth()->user()->id;
            DB::beginTransaction();
            Structure::create($input);
            Toastr::success('Structure created successfully','Success');
            DB::commit();
            return redirect()->route('structures.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Structure Create Failed');
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
        if (!auth()->user()->can('structures.view')) {
            abort(403, 'Unauthorized action.');
        }

        $structure = Structure::find($id);
        if (!$structure){
            Toastr::warning('Structure View Failed');
            return redirect('structures');
        }
        return view('structures.view', compact('structure','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('structures.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $projects = Project::all();

        $structure = Structure::find($id);
        if (!$structure){
            Toastr::warning('Structure Edit Failed');
            return redirect('structures');
        }
        return view('structures.edit', compact('structure','projects'));
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
        if (!auth()->user()->can('structures.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'description', 'project_id');
            DB::beginTransaction();
            $structure = Structure::find($id);
            $structure->fill($input)->update();
            Toastr::success('Structure updated successfully','Success');
            DB::commit();
            return redirect()->route('structures.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Structure Update Failed');
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
        if (!auth()->user()->can('structures.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $structure = Structure::find($id);
        $structure->delete();
        Toastr::success('Structure deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
