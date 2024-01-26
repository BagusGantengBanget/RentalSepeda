@extends('layouts.layouts')
@section('title')
    Data Sepeda
@endsection
@section('css-datatables')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
<style>
.bike-img{
    height: 80px;
    width: 100; 
    padding: 5px;
}
.bike-img:hover{
    transform: scale(1.07);
}
</style>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="float-left ml-3">
                    <h4 class="card-title">Data Sepeda</h4>
                    <h6 class="card-subtitle">Daftar Sepeda yang ada di Rental Sepeda ini</h6>
                    </div>
                    <div class="float-right mr-3">
                        <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i></button><span class="ml-2 font-normal text-dark">Tambah Sepeda</span>
                    @include('bikes.create')
                    </div>
                   
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table table-striped border display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Foto Sepeda</th>
                                    <th>Merk</th>
                                    {{-- <th>Type</th> --}}
                                    <th>Nama Sepeda</th>
                                    <th>Harga / Hari</th>
                                    <th>Nomor Seri</th>
                                    <th>Edit</th>
                                    <th {{-- style="width: 10%"colspan="2" --}}>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bikes as $bike)
                                <tr>
                                    <td>
                                        <img class="bike-img" src="{{$bike->getPhoto()}}" alt="bike images"/>   
                                    </td>
                                    <td>{{$bike->merk->merk_name}}</td>
                                    <td>{{$bike->bike_name}}</td>
                                    <td>{{$bike->price}}</td>
                                    <td>{{$bike->bike_number}}</td>
                                    <td>
                                        <a href="{{ url('bikes/edit', $bike->id)}}" class="btn btn-sm btn-primary" ><i class="ti-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{route('bikes.destroy', $bike->id)}}" method="post">
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

                                   