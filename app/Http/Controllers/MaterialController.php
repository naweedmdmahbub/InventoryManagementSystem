<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMaterialRequest;
use App\Models\Category;
use App\Models\Unit;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Models\Material;
use Exception;
use Illuminate\Support\Facades\DB;
use Toastr;

class MaterialController extends Controller
{
    use ImageTrait;
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
        if (!auth()->user()->can('products.view')) {
            abort(403, 'Unauthorized action.');
        }

        $materials = Material::all();
        return view('materials.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('products.create')) {
            abort(403, 'Unauthorized action.');
        }
        $categories = Category::all();
        $units = Unit::all();

        $material = new Material();
        return view('materials.create', compact('material','categories','units'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMaterialRequest $request)
    {
        dd($request->all());
        if (!auth()->user()->can('products.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'price', 'sku', 'description', 'category_id', 'unit_id', 'expiry_period');
            $input['created_by'] = auth()->user()->id;
//            dd($request->all(),public_path());
            DB::beginTransaction();
            $material = Material::create($input);
            if($request->hasFile('image')){
                $filename = $request->image->getClientOriginalName();
                $image_upload_path = public_path('\uploads\materials');
                $request->image->move($image_upload_path, $filename);
                $this->createImage($filename,$material);
//                dd($request->all(), $request->file(), $request->image, $filename, public_path(), $extension, $image_upload_path);
            }
            Toastr::success('Material created successfully','Success');
            DB::commit();
            return redirect()->route('materials.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Material Create Failed');
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
        if (!auth()->user()->can('products.view')) {
            abort(403, 'Unauthorized action.');
        }
        $categories = Category::all();
        $units = Unit::all();

        $material = Material::with('image')->find($id);
        if (!$material){
            Toastr::warning('Material View Failed');
            return redirect('materials');
        }
        return view('materials.view', compact('material','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('products.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $categories = Category::all();
        $units = Unit::all();

        $material = Material::with('image')->find($id);
        if (!$material){
            Toastr::warning('Material Edit Failed');
            return redirect('materials');
        }
//        dd($material,$material->image,public_path('uploads\materials\\').  $material->image->filename);
        return view('materials.edit', compact('material','categories','units'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMaterialRequest $request, $id)
    {
        if (!auth()->user()->can('products.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'price', 'sku', 'description', 'category_id', 'unit_id', 'expiry_period', 'created_by');
            DB::beginTransaction();
            $material = Material::find($id);
            $material->fill($input)->update();
            //Only deleting image when new image is selected.
            // When no new image is selected, image remains the same, that means no delete option for image only.
            if($request->hasFile('image')){
                $prev_image =  $material->image;
                if($prev_image){
                    $path = public_path('\uploads\materials\\').$prev_image->filename;
                    if(file_exists($path)) {
                        unlink($path);
                        $prev_image->delete();
                    }
                }
                $filename = $request->image->getClientOriginalName();
                $image_upload_path = public_path('\uploads\materials');
                $request->image->move($image_upload_path, $filename);
                $this->createImage($filename,$material);
            }
            Toastr::success('Material updated successfully','Success');
            DB::commit();
            return redirect()->route('materials.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Material Update Failed');
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
        if (!auth()->user()->can('products.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $material = Material::find($id);
        $image =  $material->image;
        if($image){
            $path = public_path('\uploads\materials\\').$image->filename;
            if(file_exists($path)) {
                unlink($path);
                $image->delete();
            }
        }
        $material->delete();
        Toastr::success('Material deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
