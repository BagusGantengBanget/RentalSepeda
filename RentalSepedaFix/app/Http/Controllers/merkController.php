<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merk;
use DataTables;

class merkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merks = Merk::all();
        return view('merks.index', compact('merks'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Merk::create($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merk::destroy($id);
        return redirect()->back();
    }

    public function data(){
        $merk = Merk::all();        
        return DataTables::of($merk)->addColumn('action', function($merk){
            return 
            '<a onclick="deleteData('.$merk->id.')" class="btn btn-danger text-white btn-sm"><i class="ti-trash"> Delete</i></a>';
        })->make(true);
    }
}
