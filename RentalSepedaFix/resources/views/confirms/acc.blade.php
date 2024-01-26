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
                      <form action="{{ route('confirms', $booking->id)}}" method="POST" enctype="multipart/form-data">
                        {{-- <form action="{{url('bikes', $edit_bike->id)}}" method="POST" enctype="multipart/form-data"> --}}
                            @method('POST')
                            @csrf
                            {{-- <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}"> <br />
                            <input type="hidden" name="available_bo" value="{{ $available= 0 }}"> <br /> --}} --}}
                            {{-- <input type="hidden" name="total_price" value="{{ $total_price = 0 }}"> <br /> --}}
                            
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

                                   