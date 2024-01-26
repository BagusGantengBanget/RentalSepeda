<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Payment;
use DateTime;
use App\Bike;
use Carbon\Carbon;
use DB;

class confirmController extends Controller
{
    public function index(){
        $bookings = Booking::where('available_bo', 1, 'return_date', null)->get();
        return view('confirms.index', compact('bookings'));
    }

    protected function update($code){
        $booking = Booking::where('booking_code', $code)->update(['available_bo' => 0,'status' => 'Sudah diverifikasi']);
        return redirect()->back();

    }
    protected function tolak(Request $request , $code){
        $booking = Booking::where('booking_code', $code)->update(['available_bo' => 2,'status' => 'Ditolak']);
        return redirect()->back();

    }
    public function destroy($id)
    {   
        Booking::destroy($id);
        $bike = Bike::find($request->bike_id);
        $bike->update(['available' => 1,]);
        return redirect()->back();
    }
    
}
