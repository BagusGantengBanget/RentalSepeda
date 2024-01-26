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
                    <div class="table-responsive">
                      <form action="{{url('clients', $edit_client->id)}}" method="POST">
                        @method('patch')
                        @csrf
                        <h1 class="h3 mb-3 fw-normal"><b>Edit Data Penyewa</b></h1>

                        <input type="hidden" name="id" value="{{ $edit_client->id }}"> <br />
            
                        <div class="form-group">
                          <label for="recipient-name" class="control-label">Nama Penyewa</label>
                          <input type="text" name="name" class="form-control" id="recipient-name1" value="{{ $edit_client->name }}">
                      </div>
                        <br>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br/>
                              <input type="radio" name="gender" value="pria" id="gender" {{$edit_client->gender == 'pria'? 'checked' : ''}} > Pria<br/>
                              <input type="radio" name="gender" value="wanita" id="gender" {{$edit_client->gender == 'wanita'? 'checked' : ''}} > Wanita<br/>
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="birthday" class="form-control" value="{{ $edit_client->birthday }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $edit_client->email }}" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" name="phone" class="form-control" value="{{ $edit_client->phone }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="address" class="form-control" value="{{ $edit_client->address }}">
                        </div>
                        <br>
                        
                        <button type="submit" onclick="goBack()" class="btn btn-danger float-left">Batalkan</button>
                        <button type="submit" class="btn btn-primary float-right" value="Simpan Data">Simpan Data</button>
                    </form>
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

                                   