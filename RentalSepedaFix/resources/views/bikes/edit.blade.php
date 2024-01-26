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
                      <form action="{{ route('bikes.update', $edit_bike->id)}}" method="POST" enctype="multipart/form-data">
                        
                            @method('PATCH')
                            @csrf
                            <h1 class="h3 mb-3 fw-normal"><b>Edit Data Sepeda</b></h1>
                            <input type="hidden" name="id" value="{{ $edit_bike->id }}"> <br />
    
                            <label for="recipient-name">Merk Sepeda</label>                           
                            <div class="form-group">
                              <table style="width: 300px">
                              <tr>  
                                <td><input type="radio" name="merk_id" value="1" id="merk_id" {{$edit_bike->merk_id == '1'? 'checked' : ''}} > Batavus</td>
                                <td><input type="radio" name="merk_id" value="5" id="merk_id" {{$edit_bike->merk_id == '5'? 'checked' : ''}} > Humber<br/></td>
                              </tr>
                              <tr> 
                                <td><input type="radio" name="merk_id" value="2" id="merk_id" {{$edit_bike->merk_id == '2'? 'checked' : ''}} > Fongers</td> 
                                <td><input type="radio" name="merk_id" value="6" id="merk_id" {{$edit_bike->merk_id == '6'? 'checked' : ''}} > Phillips<br/></td>
                              </tr>
                              <tr>
                                <td><input type="radio" name="merk_id" value="3" id="merk_id" {{$edit_bike->merk_id == '3'? 'checked' : ''}} > Gazelle</td>
                                <td><input type="radio" name="merk_id" value="7" id="merk_id" {{$edit_bike->merk_id == '7'? 'checked' : ''}} > Raleigh<br/></td>
                              </tr>
                              <tr>
                                <td><input type="radio" name="merk_id" value="4" id="merk_id" {{$edit_bike->merk_id == '4'? 'checked' : ''}} > Hercules</td>
                                <td><input type="radio" name="merk_id" value="8" id="merk_id" {{$edit_bike->merk_id == '8'? 'checked' : ''}} > Simplex<br/></td>
                              </tr>
                              </table>
                            </label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Sepeda</label>
                                <input type="text" name="bike_name" class="form-control" id="recipient-name1" value="{{ $edit_bike->bike_name }}" >
                            </div>
                            <br>
                              <div class="form-group">
                                <label for="exampleFormControlFile1">Foto Sepeda</label>
                                <br>
                                <img src="{{ URL::to('/images') }}/bike_images/{{ $edit_bike->photo }}" class="img_thumbnail" width="130px"/>
                                <input type="file" id="photo" name="photo" class="form-control-file" >{{--  id="photo" {{$edit_bike->photo == 'photo'? 'checked' : ''}} --}}
                                <input type="hidden" class="form-control-file" id="hidden_image" name="hidden_image" value="{{ $edit_bike->photo }}">
                              </div>
                          <br>
                            <div class="form-group">
                                <label>Nomor Seri Sepeda</label>
                                <input type="text" name="bike_number" class="form-control" value="{{ $edit_bike->bike_number }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="price" class="form-control" value="{{ $edit_bike->price }}">
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

                                   