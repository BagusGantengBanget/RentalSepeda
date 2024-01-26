<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Merk Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('merks.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Merk</label>
                            <input type="text" class="form-control" id="recipient-name" name="merk_name">
                        </div>
                        <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
