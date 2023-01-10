<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateManpowerRequest;
use App\Http\Resources\ManpowerResource;
use App\Models\Manpower;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManpowerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manpowers = Manpower::with('project', 'supplier')->get();
        return ManpowerResource::collection($manpowers);
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
        // dd($request->all());
        try{
            $input = $request->only('date', 'project_id', 'supplier_id', 'workers');
            $input['created_by'] = auth()->user()->id;
            DB::beginTransaction();
            $manpower = Manpower::create($input);
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
        $manpower = Manpower::with(['project:id,name', 'supplier:id,first_name,last_name'])->find($id);
        return new ManpowerResource($manpower);
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
    public function update(StoreUpdateManpowerRequest $request, $id)
    {
        // dd($id, $request->all());
        try {
            $input = $request->only('date', 'project_id', 'supplier_id', 'workers');
            $manpower = Manpower::find($id);
            DB::beginTransaction();
            $manpower->fill($input)->update();
            DB::commit();
            return new ManpowerResource($manpower);
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
            $manpower = Manpower::find($id);
            DB::beginTransaction();
            $manpower->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (\Exception $ex) {
            DB::rollBack();
            response()->json(['error' => $ex->getMessage()], 403);
        }
    }
}
