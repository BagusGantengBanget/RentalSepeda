@extends('layouts.layouts')
@section('title')
    Laporan
@endsection
@section('css-datatables')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
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
            <h4 class="card-title">Data Transaksi</h4>
            <h6 class="card-subtitle">Data transaksi yang dilakukan di Rental Sepeda ini</h6>
            <div class="table-responsive">
                <table id="multi_col_order" class="table table-striped border display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Tanggal Sewa</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Sepeda</th>
                            <th>Lama Sewa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            {{-- <th>Tanggal Kembali</th>
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
                            <td>{{$booking->duration}} Hari </td>
                            <td><p>{{$booking->status}}</p></td>
                            <td><a class="btn btn-sm btn-info" href="/reports/rincian/{{$booking->booking_code}}"><i class="ti-eye"></i> Rincian</a></td>
                            {{-- /return/{{$booking->booking_code}} 
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

@section('script')
    <script>
        $('#multi_col_order').DataTable()
    </script>
@endsection