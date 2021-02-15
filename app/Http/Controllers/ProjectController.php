<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Toastr;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('projects.view')) {
            abort(403, 'Unauthorized action.');
        }

        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('projects.create')) {
            abort(403, 'Unauthorized action.');
        }

        $project = new Project();
        return view('projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('projects.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'location', 'description', 'start_date', 'end_date', 'status');
            $input['created_by'] = auth()->user()->id;
            DB::beginTransaction();
            Project::create($input);
            Toastr::success('Project created successfully','Success');
            DB::commit();
            return redirect()->route('projects.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Project Create Failed');
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
        if (!auth()->user()->can('projects.view')) {
            abort(403, 'Unauthorized action.');
        }

        $project = Project::find($id);
        if (!$project){
            Toastr::warning('Project View Failed');
            return redirect('projects');
        }
        return view('projects.view', compact('project','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('projects.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $project = Project::find($id);
        if (!$project){
            Toastr::warning('Project Edit Failed');
            return redirect('projects');
        }
        return view('projects.edit', compact('project'));
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
        if (!auth()->user()->can('projects.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'location', 'description', 'start_date', 'end_date', 'status');
            DB::beginTransaction();
            $project = Project::find($id);
            $project->fill($input)->update();
            Toastr::success('Project updated successfully','Success');
            DB::commit();
            return redirect()->route('projects.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Project Update Failed');
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
        if (!auth()->user()->can('projects.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $project = Project::find($id);
        $project->delete();
        Toastr::success('Project deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
