<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Toastr;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (!auth()->user()->can('project_users.view')) {
//            abort(403, 'Unauthorized action.');
//        }

        $projects = Project::all();
        return view('project_users.index',compact('projects'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd('hi');
        if (!auth()->user()->can('products.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $project = Project::find($id);
        $roles = Role::where('name', 'like', '%#'.$id.'%')->get();
//        $project_users = User::all();
//        $project_users = $project->projectUsers;
        $project_users = $project->projectUsers()->with('user')->get();
        $project_users = User::where('fullname','Naweed')->get();
//        $project_users = $project->projectUsers()->with('roles')->get();
//        $project_users = $project->projectUsers()->with([
//            'roles' => function ($query) use($id) {
//                $query->where('role',$id);
//            }
//        ])->get();
//        dd($project_users);
        $users = User::all();
//        dd($project,$roles,$users,$project_users);
        if (!$project){
            Toastr::warning('ProjectUser Edit Failed');
            return redirect('project_users');
        }
        return view('project_users.edit', compact('project_users','project','roles','users'));

//        $project_user = new ProjectUser();
        return view('project_users.edit', compact('project_user','projects','roles','users'));
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
        if (!auth()->user()->can('products.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'price', 'sku', 'description', 'category_id', 'project_id', 'expiry_period', 'created_by');
            DB::beginTransaction();
            $project_user = ProjectUser::find($id);
            $project_user->fill($input)->update();
            Toastr::success('ProjectUser updated successfully','Success');
            DB::commit();
            return redirect()->route('project_users.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('ProjectUser Update Failed');
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (!auth()->user()->can('products.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $project_user = ProjectUser::find($id);
        $project_user->delete();
        Toastr::success('ProjectUser deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
