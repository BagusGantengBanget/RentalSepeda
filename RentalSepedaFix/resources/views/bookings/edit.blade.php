@extends('layouts.layouts')
@section('title')
    Data Booking
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
                    <form action="{{ route('bookings.update', $dt->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <h1 class="h3 mb-3 fw-normal"><b>Upload Bukti Booking</b></h1>
                        <input type="hidden" name="id" value="{{ $dt->id }}"> <br />
                         
                              <div class="form-group">
                                <label for="exampleFormControlFile1"></label>
                                <br>
                                
                                {{-- <img src="{{ URL::to('/images') }}/bukti/{{ $dt->photo }}" class="img_thumbnail" width="130px"/> --}}
                                <input type="file" id="photo" name="photo" class="form-control-file" >
                                <input type="hidden" class="form-control-file" id="photo" name="photo" value="{{ $dt->photo }}">
                              </div>
                              <a href="{{ url('confirms')}}" class="btn btn-danger float-left" >Batalkan</a>
                            {{-- <button type="submit" onclick="goBack()" class="btn btn-danger float-left">Batalkan</button> --}}
                            
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
{{--  <img src="{{ URL::to('/images') }}/bukti/{{ $dt->photo }}" class="img_thumbnail" width="130px"/> --}}

 {{-- <input type="hidden" name="client_id" value="{{ $edit_booking->client_id }}"> <br />
 <input type="hidden" name="bike_id" value="{{ $edit_booking->bike_id }}"> <br />
 <input type="hidden" name="available_bo" value="{{ $edit_booking->available_bo }}"> <br />
 <input type="hidden" name="booking_code" value="{{ $edit_booking->booking_code }}"> <br />
 <input type="hidden" name="order_date" value="{{ $edit_booking->order_date }}"> <br />
 <input type="hidden" name="duration" value="{{ $edit_booking->duration }}"> <br />
 <input type="hidden" name="return_date_supposed" value="{{ $edit_booking->return_date_supposed }}"> <br />
 <input type="hidden" name="total_price" value="{{ $edit_booking->total_price }}"> <br />
 <input type="hidden" name="booking_code" value="{{ $edit_booking->booking_code }}"> <br /> --}}