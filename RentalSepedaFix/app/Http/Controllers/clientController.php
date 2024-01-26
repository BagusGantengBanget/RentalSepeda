<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use DB;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::where('level', "user")->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id)
    {   
        $clients = User::all();
          
        $edit_client = DB::table('users')->where('id', $id)->first();
        return view('clients/edit',compact('edit_client','clients'));
        
    }

    /** Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
   
       DB::table('users')->where('id',$id)->update([
           
           'name' => $request->name,
           'email' => $request->email,
           'gender' => $request->gender,
           'birthday' => $request->birthday,
           'phone' => $request->phone,
           'address' => $request->address,
       ]);
      /*  dd($client); */
       
       
       return redirect('clients')->with('message','Data berhasil di update');
   }
    /* public function store(Request $request)
    {
        $client = Client::create([
            
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
            
        ]);
        $client->save();
        return redirect()->back();
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
