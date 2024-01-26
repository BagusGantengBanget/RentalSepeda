<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Sepeda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('bikes.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="#merks">Merk</label>
                            <select name="merk_id" id="merk_id" class="form-control">
                                <option disabled selected>- Pilih Salah Satu -</option>
                                @foreach ($merks as $merk)
                                <option value="{{$merk->id}}">{{$merk->merk_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Sepeda</label>
                            <input type="text" name="bike_name" class="form-control" id="recipient-name1">
                        </div>
                        <div class="form-group">
                            <label>Foto Sepeda</label>
                            <input type="file" name="photo" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Nomor Seri Sepeda</label>
                            <input type="text" name="bike_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-right">Send message</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="form-group">
        <label>Type</label>
        <select name="type" class="form-control">
            <option disabled selected>- Pilih Salah Satu -</option>
            <option value="manual" {{ (old("type") == 'manual' ? "selected":"") }}>Manual</option>
            <option value="matic" {{ (old("type") == 'matic' ? "selected":"") }}>Matic</option>
        </select>
    </div> --}}