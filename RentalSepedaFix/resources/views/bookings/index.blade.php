@extends('layouts.layouts')
@section('title')
    Booking Sepeda
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
    <style>
        .bike-img{
            width: 100%;
            max-height: 220px;
            padding-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <h2>Pilih Sepeda</h2>
    <div class="row">
        @foreach ($bikes as $bike)
        <div class="col-lg-4">
            <div class="card">
                <img class="bike-img" src="{{$bike->getPhoto()}}" alt="bike images">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center mb-3">
                        <span><strong>Rp {{number_format($bike->price)}} / Hari</strong></span>
                        {{-- <div class="ml-auto">
                            <span><i class="ti-bike"></i> {{$bike->type}}</span>
                        </div> --}}
                    </div>
                    <h3>{{$bike->bike_name}}</h3>
                    <div class="d-flex no-block align-items-center pb-3">
                        <span class="text-muted">{{$bike->merk->merk_name}}</span>
                        <div class="ml-auto">
                            <span class="text-muted"><strong>{{$bike->bike_number}}</strong></span>
                        </div>
                    </div>
                    <div id="accordion" class="accordion">
                        <div class="card mt-2">
                            @if($bike->available=='1')
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-block btn-info" data-toggle="collapse" data-target="#collapse{{$bike->id}}" aria-expanded="true" aria-controls="collapse{{$bike->id}}">
                                    <i class="fa fa-bike"></i> Rental
                                    </button>
                                </h5>
                            </div>
                            @elseif($bike->available=='0')
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-block btn-danger">
                                    <i class="fa fa-bike"></i> Sudah Dipesan
                                    </button>
                                </h5>
                            </div>
                            @endif
                            <div id="collapse{{$bike->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="/bookings/calculate" method="post">
                                    @csrf
                                    <input type="hidden" name="bike_id" value="{{$bike->id}}">
                                    <div class="form-group">
                                        <label>Kode Booking</label>
                                        <input type="text" name="booking_code" readonly required value="M-{{rand()}}" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="#clients">Nama Penyewa</label><br>
                                        <select type="text" class="form-control" name="client_id">
                                            <option selected readonly value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                        </select>
                                    </div>
                                     {{-- @foreach ($clients as $client) --}}
                                            {{-- @endforeach --}}
                                    <div class="form-group">
                                        <label>Tanggal Order</label>
                                        <input type="date" name="order_date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Lama Sewa</label>
                                        <input type="number" class="form-control" name="duration">
                                    </div>

                                    <button type="submit" class="btn btn-block btn-secondary">Rental</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
@section('script')
<script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('dist/js/pages/forms/select2/select2.init.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#clients').select2();
    })
</script>
@endsection