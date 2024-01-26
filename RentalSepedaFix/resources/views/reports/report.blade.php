@extends('layouts.layouts')
@section('title')
    Laporan
@endsection
@section('content')
<div class="card">
    <div class="container p-3">
        <form action="" method="GET">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" name="start_date" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Sampai</label>
                    <input type="date" name="end_date" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit"  name="cari" class="btn btn-secondary btn-block"><i class="fa fa-search"></i></button>
    </form>
    </div>
</div>

<div class="material-card card">
        <div class="card-body">
            <h4 class="card-title">Data Transaksi | <span style="font-weight: 200;">{{$_GET['start_date']}} <strong>sampai</strong> {{$_GET['end_date']}}</span></h4>
            <h6 class="card-subtitle">Data transaksi yang dilakukan di Rental Sepeda ini</h6>
            <div class="table-responsive">
                <table id="multi_col_order" class="table table-striped border display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Tanggal Sewa</th>
                            <th>Nama Penyewa</th>
                            <th>Sepeda</th>
                            <th>Status</th>
                            {{-- <th>Durasi Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Dikembalikan</th>
                            <th>Denda</th>
                            <th>Total Harga</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{$booking->booking_code}}</td>
                            <td>{{$booking->order_date}}</td>
                            <td>{{$booking->client->name}}</td>
                            <td>{{$booking->bike->bike_name}}</td>
                            <td>{{$booking->status}}</td>
                            {{-- <td>{{$booking->duration}} Hari</td>
                            <td>{{$booking->return_date_supposed}}</td>
                            <td>{{$booking->return_date}}</td>
                            <td>{{$booking->fine}}</td>
                            <td>{{$booking->total_price}}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection