@extends('layouts.layouts')
@section('title')
    Konfirmasi Sewa
@endsection
@section('css-datatables')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card material-card">
                    <div class="card-body">
                        <h4 class="card-title">Data Konfirmasi Booking</h4>
                        <h6 class="card-subtitle">Data Konfirmasi Booking yang ada di Rental Sepeda ini</h6>
                            <div class="table-responsive">
                                <table id="bookingTable" class="table table-striped border display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kode Booking</th>
                                            <th>Tanggal Rental</th>
                                            <th>Nama Penyewa</th>
                                            <th>Sepeda</th>
                                            <th>Lama Sewa</th>                                
                                            <th>Aksi</th>
                                            @if (auth()->user()->level == "admin")
                                            <th></th>
                                            @endif
                                            @if (auth()->user()->level == "user")
                                            <th>Status Bayar</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->booking_code}}</td>
                                            <td>{{$booking->order_date}}</td>
                                            <td>{{$booking->client->name}}</td>
                                            <td>{{$booking->bike->bike_name}}</td>
                                            <td>{{$booking->duration}} Hari</td>
                                            @if (auth()->user()->level == "user")
                                            <td>                               
                                                <a href="{{ url('bookings/edit', $booking->id)}}" class="btn btn-sm btn-success" >Upload Bukti</a>   
                                            </td>
                                            @endif
                                            @if (auth()->user()->level == "user")
                                            <td>                               
                                                @if($booking->photo == null)
                                                <img class="bike-img" src="{{$booking->photo}}" alt="Belum Upload"/>
                                                @else
                                                <img class="bike-img" src="{{$booking->photo}}" alt="Sudah Upload"/>
                                                @endif
                                            </td>
                                            @endif
                                            @if (auth()->user()->level == "admin")
                                            <td>                               
                                                <a href="{{ url('confirms/tolak', $booking->booking_code)}}" class="btn btn-sm btn-danger" >Tolak</a>   
                                            </td>
                                            <td>
                                                <a href="{{ url('confirms/acc', $booking->booking_code)}}" class="btn btn-sm btn-info" >Setuju</a>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#bookingTable').DataTable();
    </script>
@endsection
