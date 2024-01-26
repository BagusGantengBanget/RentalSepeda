@extends('layouts.layouts')
@section('title')
    Data Penyewa
@endsection
@section('css-datatables')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="float-left ml-3">
                    <h4 class="card-title">Data Penyewa</h4>
                    <h6 class="card-subtitle">Daftar Penyewa yang ada di Rental Sepeda ini</h6>
                    </div>
                    {{-- <div class="float-right mr-3">
                        <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i></button><span class="ml-2 font-normal text-dark">Tambah Penyewa</span>
                    @include('clients.create')
                    </div> --}}
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table table-striped border display" style="width:100%">
                            <thead>
                                <tr>
                                   {{--  <th>NIK</th> --}}
                                    <th>Nama Penyewa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email</th>
                                    <th>Nomor HP</th>
                                    <th>Alamat</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    {{-- <td>{{$client->nik}}</td> --}}
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->gender}}</td>
                                    <td>{{$client->birthday}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->address}}</td>
                                    <td>
                                        <a href="{{ url('clients/edit', $client->id)}}" class="btn btn-sm btn-primary" ><i class="ti-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{route('clients.destroy', $client->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="ti-trash"></i></button>
                                        </form>                           
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
        $('#multi_col_order').DataTable()
    </script>
@endsection