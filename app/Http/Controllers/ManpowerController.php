<?php

namespace App\Http\Controllers;
use App\Models\Manpower;

class ManpowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manpowers = Manpower::all();
        return view('manpowers.index',compact('manpowers'));
    }
}
