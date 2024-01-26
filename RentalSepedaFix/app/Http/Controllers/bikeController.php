<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merk;
use App\Bike;
use DB;

class bikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all();
        $available = Bike::where('available', 1 )->get();
        $merks = Merk::all();
        return view('bikes.index', compact('merks', 'bikes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bike = Bike::create($request->all());
        if($request->hasFile('photo'))
        {
            $request->file('photo')->move('images/bike_images/', $request->file('photo')->getClientOriginalName());
            $bike->photo = $request->file('photo')->getClientOriginalName();
            $bike->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {   
        $edit_bike = Bike::find($id);
        return view('bikes/edit',compact('edit_bike'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('photo');

        if($image != '')
        {
            $request->validate([
            'merk_id' => 'required',
            'bike_name' => 'required',
            'bike_number' => 'required',
            'price' => 'required',
            'photo' => 'image|max:2048'
            ]);
            $image_name = rand () .'.'. $image->getClientOriginalExtension();
           /*  $image_name = $old_image_name; */
            $image->move(public_path('images/bike_images'),$image_name);
        }else {
            $request->validate([
            'merk_id' => 'required',
            'bike_name' => 'required',
            'bike_number' => 'required',
            'price' => 'required',
            ]);
            /* $image_name = $old_image_name; */
        } 

        $data_bike = array(
        'merk_id' => $request->merk_id,
         'bike_name' => $request->bike_name,
         'bike_number' => $request->bike_number,
         'price' => $request->price,
         'photo' => $image_name
        );
        Bike::whereId($id)->update($data_bike);
        
        return redirect('bikes')->with('message', 'Berhasil Edit');
        
        
    }
    
    /**
         * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bike::destroy($id);
        return redirect()->back();
    }
    

}
