<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Email Notify</title>
    <style>
        body {
            background-color:#bdc3c7;
            margin:0;
        }
        .card {
            background-color:#fff;
            padding:20px;
            margin:20%;
            text-align:center;
            margin:0px auto;
            width: 580px; 
            max-width: 580px;
            margin-top:10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .garis {
            width: 75%;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h2 class="">Selamat Datang di Rental Bagus</h2>
        <hr class="garis">
        <p>Terima Kasih telah memesan sepeda di Aplikasi Rental Bagus</p>
        <?php
        $t=time();
        echo(" Tanggal Pemesanan : ");
        echo(date("D, d F Y",$t));
        ?>
        
        <p>Untuk Pembayaran Silahkan Transfer ke Nomor Rekening berikut :
        <br>
        Bank Mandiri : 999-88-1402140-2</p>
        
        <p>Upload foto bukti transfer dan kirim ke email berikut :
        <br>
        Email : rentalbagus14@gmail.com
        </p>
        {{-- <hr class="garis"> --}}

        <h4>-- Selamat Bersepeda --</h4>
    </div>  
    
    
</body>
</html>

{{-- <p id="countdown"></p>
<script src="mailscript.js"></script> --}}

{{-- use App\Booking;
use Illuminate\Http\Request;

function proses(Request $request){
    $waktu = Booking::where('id', $request->return_date_supposed);
    $days    =(int)((mktime ($waktu) - time())/86400);
    return  "Masih ada <b>$days</b> hari lagi";
}
proses(); --}}