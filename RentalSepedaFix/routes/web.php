<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// data 
Auth::routes();
Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');
Route::get('/api/merks', 'merkController@data')->name('api.merks');
Route::get('/logout', 'HomeController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reports/rincian/{code}', 'reportController@show');
Route::get('/confirms', 'confirmController@index');
/* Route::get('/pdf', 'PdfController@show')->name('print'); */



Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    
    Route::resource('bikes', 'bikeController');
    Route::resource('merks', 'merkController');
    Route::resource('clients', 'clientController');
    Route::get('/confirms/acc/{code}', 'confirmController@update');
    Route::get('/confirms/tolak/{code}', 'confirmController@tolak');
    
    
    Route::get('/returns', 'returnController@index');
    Route::get('/return/{code}', 'returnController@show');
    Route::post('/return/store', 'returnController@store');
    Route::get('/transactionAdmin', 'reportAdminController@index');
    
    
    //Update
    Route::get('/bikes/edit/{id}','bikeController@edit');
    Route::patch('/bikes/{id}','bikeController@update');
    Route::get('/clients/edit/{id}','clientController@edit');
    Route::patch('/clients/{id}','clientController@update');
    
});

Route::group(['middleware' => ['auth','ceklevel:user']], function () {
    Route::post('/bookings/calculate', 'bookingController@calculate');
    Route::post('/bookings/process', 'bookingController@process');
    Route::get('/transaction', 'reportController@index');
    
    //update
    Route::resource('bookings', 'bookingController');
    Route::get('/bookings/edit/{id}','bookingController@edit');
    Route::patch('/bookings/{id}','bookingController@update');
    

    //Notif_Email
    Route::get('/send-mail', function () 
    {
        $details = [
         'title' => 'Mail from RentalBagus@gmail.com',
         'body' => 'Terima Kasih sudah Menyewa sepeda di Rental Bagus'
         ];
         \Mail::to(Auth::user()->email)->send(new \App\Mail\MyDemoMail($details));
         
         return redirect('/home');
    });
        
});
?>