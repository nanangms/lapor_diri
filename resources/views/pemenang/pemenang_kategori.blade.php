@extends('layouts.master')

@section('title')
Pemenang Kategori : {{$kategori->nama_kat_pemenang}}
@endsection
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('ad/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('ad/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('ad/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemenang Kategori : <strong>{{$kategori->nama_kat_pemenang}}</strong></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Pemenang Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kategori : {{$kategori->nama_kat_pemenang}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>

        </div>
        <div class="card-body">
          <a href="/pemenang" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
          <h4 align="center">Form Tambah Pemenang</h4>
          <hr>
          <div id="modal-body">
            <form action="/pemenang-kategori/tambah" class="form-horizontal" method="POST">
                @csrf
                <input type="hidden" name="kategori_pemenang_id" id="kategori_pemenang_id" value="{{$kategori->id}}" placeholder="" class="form-control">
                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">No. peserta</span>
                    <div class="col-lg-5">
                      <input type="text" name="no_peserta" id="no_peserta" value="" placeholder="xx-xxxx" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                    <div class="col-lg-9">
                       <button id="modal-btn-save" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
              </form>
            </div>
            <hr>
            <table id="datatable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Peserta</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
      </div>
  </section>
</div>
<!-- Basic Modal Start -->
<div id="modal-update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pemenang</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="update-menu">
                <form action="/pemenang-k/edit" class="form-horizontal" method="POST">
                {{csrf_field()}}
                <input type="text" name="id" value="">
                <input type="hidden" name="kategori_pemenang_id" id="kategori_pemenang_id" value="{{$kategori->id}}" placeholder="" class="form-control">
                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">No. peserta</span>
                    <div class="col-lg-5">
                      <input type="text" name="no_peserta" id="no_peserta" value="" placeholder="xx-xxxx" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                    <div class="col-lg-9">
                       <button id="modal-btn-edit" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Basic Modal End -->
<!-- MODALS EDIT-->        
<div id="ShowEDIT" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal-body">

                <div class="isi"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('ad/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('jQuery-Mask/dist/jquery.mask.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $('#no_peserta').mask('00-0000');

    var id = '{{$id}}';
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax:"{{url('get_pemenang_kategori')}}/"+id,
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'no_peserta', name: 'no_peserta'},
            {data: 'nama_peserta', name: 'nama_peserta'},
            {data: 'action', name: 'action'}
        ]
    });

    $('#modal-btn-save').click(function (event) {
        event.preventDefault();
        $('#modal-btn-save').text('Menyimpan data...'); //change button text
        $('#modal-btn-save').attr('disabled',true); //set button disable
        var form = $('#modal-body form'),
            url = form.attr('action');
            //method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

         form.find('.text-danger').remove();
         form.find('.form-group').removeClass('has-error');

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                form.trigger('reset');
                $('#datatable').DataTable().ajax.reload();
                swal("Berhasil", "Data Berhasil Disimpan", "success");
                $('#modal-btn-save').removeAttr('disabled').text('Simpan');
            },
            

            error: function (err) {
                if (err.status == 422){
                    console.log(err.responseJSON);

                    //console.warn(err.responseJSON.errors);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="text-danger">'+error[0]+'</span>'));
                    });
                }
                $('#modal-btn-save').removeAttr('disabled').text('Simpan');
            }


            
        })
    });
    $('#modal-btn-edit').click(function (event) {
        event.preventDefault();
        $('#modal-btn-edit').text('Menyimpan data...'); //change button text
        $('#modal-btn-edit').attr('disabled',true); //set button disable
        var form = $('#update-menu form'),
            url = form.attr('action');
            //method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

         form.find('.text-danger').remove();
         form.find('.form-group').removeClass('has-error');

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                form.trigger('reset');
                $('#modal-update').modal('hide');
                $('#datatable').DataTable().ajax.reload();
                swal("Berhasil", "Data Berhasil Dirubah", "success");
                $('#modal-btn-edit').removeAttr('disabled').text('Simpan');
            },
            

            error: function (err) {
                if (err.status == 422){
                    console.log(err.responseJSON);

                    //console.warn(err.responseJSON.errors);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="text-danger">'+error[0]+'</span>'));
                    });
                }
                $('#modal-btn-edit').removeAttr('disabled').text('Simpan');
            }


            
        })
    });
    $('body').on('click', '.hapus', function (event) {
      event.preventDefault();

      var user_name = $(this).attr('user-name'),
        title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
        user_id = $(this).attr('user-id');
      swal({
                title: "Anda Yakin?",
                text: "Mau Menghapus Data : "+ title +"?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
      .then((result) => {
        if (result) {
            $.ajax({
                url: "/pemenang/"+user_id+"/delete",

                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal("Berhasil", "Data Berhasil Dihapus", "success");
                },
                error: function (xhr) {
                    swal("Oops...", "Terjadi Kesalahan", "error");
                    
                }
            });
        }
      });
    });

    $("#modal-update").on("show.bs.modal", function(e){
        $uuid = $(e.relatedTarget).data('id');
        $.get("{{url('pemenang/get-record')}}/"+$uuid, function($data){
        $("#update-menu input[name=id]").val($data.id);
        $("#update-menu input[name=no_peserta]").val($data.no_peserta);
      });
    });

    $("#ShowEDIT").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');

            $.ajax({
                url: "/pendaftaran" +'/' + id +'/detail',
                dataType: 'html',
                success: function (response) {
                    $('.isi').html(response);
                }
            });

        });
  }); 

</script>
    
@stop





















