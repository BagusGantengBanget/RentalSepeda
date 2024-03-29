<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Client;
use Auth;

class reportAdminController extends Controller
{
    public function index(Request $request){
        if(isset($_GET['cari'])){
            $bookings = Booking::whereBetween('order_date', [$request->start_date, $request->end_date])->get();
            return view('reports.report', compact('bookings'));
        }
        $bookings = Booking::all();
        if (auth()->user()->level == "admin"){
            return view('reports.index', compact('bookings'));
        }

        
    }
}

