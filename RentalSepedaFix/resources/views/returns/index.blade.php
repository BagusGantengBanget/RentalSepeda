@extends('layouts.layouts')
@section('title')
    Pengembalian
@endsection
@section('css-datatables')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card material-card">
                    <div class="card-body">
                        <h4 class="card-title">Data Booking</h4>
                        <h6 class="card-subtitle">Data Booking yang ada di Rental Sepeda ini</h6>
                            <div class="table-responsive">
                                <table id="bookingTable" class="table table-striped border display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kode Booking</th>
                                            <th>Nama Penyewa</th>
                                            <th>Sepeda</th>
                                            <th>Tanggal Rental</th>
                                            <th>Lama Sewa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->booking_code}}</td>
                                            <td>{{$booking->client->name}}</td>
                                            <td>{{$booking->bike->bike_name}}</td>
                                            <td>{{$booking->order_date}}</td>
                                            <td>{{$booking->duration}} Hari</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="/return/{{$booking->booking_code}}"><i class="ti-eye"></i> Lihat</a>                                 
                                            </td>
                                            
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
