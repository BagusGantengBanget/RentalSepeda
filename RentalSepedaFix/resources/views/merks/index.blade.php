@extends('layouts.layouts')
@section('meta')
    <meta name="csrf_token" content="{{ csrf_token() }}">
@endsection
@section('title')
    Data Sepeda
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
                    <h4 class="card-title">Data Merk</h4>
                    <h6 class="card-subtitle">Daftar Merk Sepeda yang ada di Rental Sepeda ini</h6>
                    </div>
                    <div class="float-right mr-3">
                        <button type="button" class="btn btn-circle btn-sm btn-info" onclick="addForm()" ><i class="ti-plus"></i></button><span class="ml-2 font-normal text-dark">Tambah Merk</span>
                    @include('merks.create')
                    </div>
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table table-striped border display" style="width:100%">
                            <thead>
                                <tr>
                                  <th style="width: 70%">Merk Sepeda</th>
                                  <th style="width: 30%">Aksi</th>
                                </tr>
                                
                                
                            </thead>
                            <tbody>
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
        var table = $('#multi_col_order').DataTable({
                    serverSide: true,
                    ajax: "{{ route('api.merks') }}",
                    columns: [
                      {data: 'merk_name', name: 'merk_name'},
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                })

        function addForm(){
            $('#modalForm').modal('show');
            $('#modalForm form')[0].reset();
        }
            
        $('#modalForm form').on("submit", function(e){
            e.preventDefault(); 
            $.ajax({
              url: "{{url('merks')}}",
              type : "POST",
              data : $('#modalForm form').serialize(),
              success: function(){
                $('#modalForm').modal('hide');
                table.ajax.reload();
                Swal.fire(
                    'Congrats',
                    'Data have been added',
                    'success'
                    )
              },
            })
        })

        function deleteData(id){
        var csrf_token = $('meta[name="csrf_token"]').attr('content')
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                  url: "{{ url('merks') }}" + "/" + id,
                  type: "POST",
                  data: {
                    '_method' : 'DELETE', 
                    '_token' : csrf_token
                  },
                  success: function(data){
                    table.ajax.reload();         
                  },
                  error: function(){
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        })
                  }
                }),
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
        }
        
        
    </script>
@endsection

