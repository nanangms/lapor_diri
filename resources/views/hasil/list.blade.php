@extends('layouts.master')

@section('title')
Hasil Gowes
@endsection
@section('header')
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
            <h1>Hasil Gowes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Hasil Gowes</li>
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
          <h3 class="card-title">Data Hasil Gowes</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <p align="center">
                <!-- <a href="/submit-gowes/17" class="btn btn-success">17 Km</a>
                <a href="/submit-gowes/28" class="btn btn-success">28 Km</a>
                <a href="/submit-gowes/75" class="btn btn-success">75 Km</a> -->
                <a href="/submit-gowes/17" class="btn btn-success">17 Km</a>
                <a href="/submit-gowes/45" class="btn btn-success">45 Km</a>
                <a href="/submit-gowes/76" class="btn btn-success">76 Km</a>
            </p>
            <hr>
            <table class="table table-hover table-bordered" id="table_id" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Pendaftaran</th>
                        <th>Nama</th>
                        <th>Tgl Gowes</th>
                        <th>Jarak yg ditempuh</th>
                        <th>Tgl Kirim</th>
                        <th>Foto Hasil</th>
                        <th>Status</th>
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


<!-- MODALS EDIT-->        
<div id="ShowEDIT" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Hasil Gowes</h5>
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

<!-- MODALS EDIT-->        
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Status</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal-hasil">
                <form action="/hasil/store" class="form-horizontal" method="post" id="formj">
                {{csrf_field()}}
                <input type="hidden" class="form-control" id="id" name="id"/>

                    <div class="form-group row">
                        <span class="label-text col-lg-3 col-form-label text-md-right">Status</span>
                        <div class="col-lg-6">
                            <select class="form-control" name="status" id="status">
                                <option value="">--Pilih--</option>
                                <option value="Terpenuhi">Terpenuhi</option>
                                <option value="Tidak Terpenuhi">Tidak Terpenuhi</option>
                            </select>
                            
                            @if($errors->has('jenis_kelamin'))
                                <span class="text-danger">{{$errors->first('jenis_kelamin')}}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="label-text col-lg-3 col-form-label text-md-right"></span>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="button" id="btnEdit"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                <br>
            </form>
                
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

<script>
    $(document).ready(function(){
        $('#table_id').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.hasilgowes') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'no_pendaftaran', name: 'no_pendaftaran'},
                {data: 'nama', name: 'nama'},
                {data: 'tgl_gowes', name: 'tgl_gowes'},
                {data: 'jarak_tempuh', name: 'jarak_tempuh'},
                {data: 'tgl_kirim', name: 'tgl_kirim'},
                {data: 'foto', name: 'foto'},
                {data: 'stat', name: 'stat'},
                {data: 'action', name: 'action'}
            ]
        });

        $('body').on('click', '.hapus', function (event) {
            event.preventDefault();

            var user_name = $(this).attr('hasil-name'),
            title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            hasil_id = $(this).attr('hasil-id');
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
                        url: "/hasil_gowes/"+hasil_id+"/delete",

                        success: function (response) {
                            $('#table_id').DataTable().ajax.reload();
                            swal("Berhasil", "Data Berhasil Dihapus", "success");
                        },
                        error: function (xhr) {
                            swal("Oops...", "Terjadi Kesalahan", "error");
                            
                        }
                    });
                }
            });
        });
        $("#ShowEDIT").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');

            $.ajax({
                url: "/hasil_gowes" +'/' + id +'/detail',
                dataType: 'html',
                success: function (response) {
                    $('.isi').html(response);
                }
            });

        });

        $('body').on('click', '.editHasil', function () {
            $('#btnEdit').removeAttr('disabled').text('Simpan');
            var pelanggaran_id = $(this).data('id');
            $.get("/hasil_gowes" +'/' + pelanggaran_id +'/edit', function (data) {
                
                $('#editModal').modal('show');
                $('#id').val(data.id);
                $('#status').val(data.status).trigger('change');
                
            })
        });

        $('#btnEdit').click(function (event) {
            event.preventDefault();
            $('#btnEdit').text('Menyimpan data...'); //change button text
            $('#btnEdit').attr('disabled',true); //set button disable 
            var form = $('#modal-hasil form'),
                url = form.attr('action');
            form.find('.text-danger').remove();
            form.find('.form-group').removeClass('has-error');

            $.ajax({
                url: url,
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    form.trigger('reset');
                    $('#editModal').modal('hide');
                    $('#table_id').DataTable().ajax.reload(null,false);
                    //window.location.reload()
                    swal("Berhasil", "Data Berhasil Diupdate", "success");
                },

                error: function (err) {
                    if (err.status == 422){
                        console.log(err.responseJSON);

                        console.warn(err.responseJSON.errors);
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#btnEdit').removeAttr('disabled').text('Simpan');
                    }
                }
            })
        });
    });
</script>
   
@stop