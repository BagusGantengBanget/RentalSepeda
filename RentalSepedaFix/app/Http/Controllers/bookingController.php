<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bike;
use App\User;
use App\Booking;
use App\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use MyDemoMail;
use DB;
use Auth;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::all();
        $bikes = Bike::all();
        /* $ordered = Bike::where('available', 1 )->get(); */
        return view('bookings.index', compact('bikes', 'clients'/* ,'ordered' */));
        
    }
    /* public function store(Request $request)
    {
        $book = Booking::create($request->all());
        if($request->hasFile('photo'))
        {
            $request->file('photo')->move('images/bike_images/', $request->file('photo')->getClientOriginalName());
            $book->photo = $request->file('photo')->getClientOriginalName();
            $book->save();
        }
        return redirect()->back();
    } */
    public function edit($id)
    {
        /* $bookings = Booking::all(); */
        $dt = Booking::find($id);
        return view('bookings/edit',compact('dt'/* ,'bookings' */));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update (Request $request, $id)
     {
        $ubah = Booking::find($id);
        $awal = $ubah->photo;
        /* if($request->hasFile('photo'))
        {
            $ubah->photo = $request->file('photo')->getClientOriginalName();
            $ubah->save();
        } */
        $dt = [
            'available_bo' => $request['available_bo'],
            'photo' => $awal,
        ];
        
        $request->file('photo')->move('images/bukti', $request->file('photo')->getClientOriginalName());
        $ubah->photo = $request->file('photo')->getClientOriginalName();
        $ubah->save();
        
        
        /* $ubah->update($dt); */
        return redirect('confirms');
        
     }



    /* public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('photo');

        if($image = null)
        {
            $request->validate([
            'client_id' => 'required',
            'bike_id' => 'required',
            'available_bo' => 'required',
            'booking_code' => 'required',
            'order_date' => 'required',
            'duration' => 'required',
            'return_date_supposed' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'photo' => null
            ]);
            $image_name = rand () .'.'. $image->getClientOriginalExtension();
           
            $image->move(public_path('images/bike_images'),$image_name);
        }else {
            $request->validate([
            'client_id' => 'required',
            'bike_id' => 'required',
            'available_bo' => 'required',
            'booking_code' => 'required',
            'order_date' => 'required',
            'duration' => 'required',
            'return_date_supposed' => 'required',
            'price' => 'required',
            'amount' => 'required',
            ]);
            
        } 

        $data_booking = array(
            'client_id' => $request->client_id,
            'bike_id' => $request->bike_id,
            'available_bo' => $request->available_bo,
            'booking_code' => $request->booking_code,
            'order_date' => $request->order_date,
            'duration' => $request->duration,
            'return_date_supposed' => $request->return_date_supposed,
            'total_price' => $request->total_price,
            'photo' => $image_name

        );
        Booking::whereId($id)->update($data_booking);
        return redirect('confirms');
    } */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calculate(Request $request)
    {
        $data = $request->toArray();

        Validator::make($data, [
            'booking_code' => ['required', 'string', 'unique:bookings'],
        ]);
            
        $client = User::where('id', $request->client_id)->first();
        $bike = Bike::where('id', $request->bike_id)->first();
        $available = Bike::where('available', $request->available)->first();
        
        $order_date = $request->order_date;
        /* $order_date = new order_date( 'now', new DateTimeZone('Asia/Jakarta') ); */
        $duration = $request->duration;

        $return_date = date('Y-m-d', strtotime('+'.$duration.'days', strtotime($order_date)));
       /*  $return_date = order_date_add($order_date , date_interval_create_from_date_string('$duration', 'hours')); */
        $total_price = $bike->price * $duration;

        // dp => 30% dari total harga
        $dp = $total_price * 30 / 100;

        return view('bookings.confirm', compact('client', 'bike', 'return_date', 'data', 'total_price', 'dp'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
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

        //insert to table booking first
        $insert_booking = Booking::create([
            'booking_code' => $request->booking_code,
            'order_date' => $request->order_date,
            'duration' => $request->duration,
            'return_date_supposed' => $request->return_date_supposed,
            'total_price' => $request->total_price,
            'bike_id' => $request->bike_id,
            'client_id' => $request->client_id,
            'available_bo' => $request->available,
            'status' => 'Menunggu verifikasi',

        ]);

        //insert to payment
        $insert_payment = Payment::create([
            'type' => $request->type,
            'amount' => $request->amount,
            'client_id' => $request->client_id,
            'booking_code' => $request->booking_code
        ]);
        $duration = $request->duration;
        $bike = Bike::find($request->bike_id);
        $bike->available = '0';
        $bike->save();
        
        return redirect('/send-mail');
        return view('/bookings');
        
        /* if (){    
        }
        else{
            return redirect('/home');
        } */
    }
   /*  public function store(Request $request){
        $bike = Bike::find($request->bike_id);
        $bike->update(['available' => 0 ]);

        return redirect()->back();
    } */

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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Booking::destroy($id);
        return redirect()->back();
    }
}
