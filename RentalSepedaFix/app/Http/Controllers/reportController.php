<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Booking;
use App\User;
use App\Client;
use App\Payment;
use DateTime;
use App\Bike;
use Carbon\Carbon;
use Auth;
use PDF;

class reportController extends Controller
{
    public function index(Request $request){
        if(isset($_GET['cari'])){
            $bookings = Booking::whereBetween('order_date', [$request->start_date, $request->end_date])->get();
            return view('reports.report', compact('bookings'));
        }
        $bookings = Booking::where('client_id', Auth::user()->id)->get();
        if (auth()->user()->level == "user"){
            return view('reports.index', compact('bookings'));
        }
        
    }

    public function show (Request $request, $code){
        $data = $request->toArray();    
        Validator::make($data, [
            'booking_code' => ['required', 'unique:bookings'],
            'order_date' => ['required'],
            'duration' => ['required'],
            'client_id' => ['required', 'integer'],
            'bike_id' => ['required','integer'],
            'available_bo' => ['required','integer'],
            'status' => ['required','string'],
            'duration' => ['required','integer'],
            'return_date_supposed' => ['required'],
            'price' => ['required','integer'],
            'amount' => ['required','integer']
        ]);

        $booking = Booking::where('booking_code', $code)->first();
        $payment = Payment::where('booking_code', $code)->first();
        
        // fine / denda (*10%/hari)
        if($booking->return_date_supposed < date('Y-m-d')){
            $return_supposed = new DateTime($booking->return_date_supposed);
            $return_now = new DateTime(date('Y-m-d'));
            $selisih = $return_supposed->diff($return_now);
            $late = $selisih->days;
            $fine = $booking->bike->price * 10 / 100 * $late;
            $data['fine'] = $fine + $booking->bike->price * $late;;
    		$data['late'] = $late;
        }else{
            $data['fine'] = null;
            $data['late'] = null;
        }

        $data['total'] = $booking->total_price - $payment->amount;
        $data['dp'] = $payment->amount;
        $data['now'] = Carbon::now()->toDateString();
        // dd($data['now']);

        return view('reports.rincian', compact('booking','data'));
    }

    public function cetak_pdf()
    {

    	$pdf = PDF::loadview('reports.rincian')->setPaper('A4','potrait');
    	return $pdf->download('Data_Transaksi_pdf');
    }

}

