@extends('layouts.master')

@section('title')
Pendaftaran Kategori {{$kategori_jarak}}
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
            <h1>Pendaftaran Kategori {{$kategori_jarak}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Pendaftaran Kategori {{$kategori_jarak}}</li>
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
          <h3 class="card-title">Data Pendaftaran Kategori {{$kategori_jarak}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <p align="center">
                <!-- <a href="/pendaftaran/17" class="btn btn-success">17 Km</a>
                <a href="/pendaftaran/28" class="btn btn-success">28 Km</a>
                <a href="/pendaftaran/75" class="btn btn-success">75 Km</a> -->
                <a href="/pendaftaran/17" class="btn btn-success">17 Km</a>
                <a href="/pendaftaran/45" class="btn btn-success">45 Km</a>
                <a href="/pendaftaran/76" class="btn btn-success">76 Km</a>
            </p>
            <hr>
            @if(Request::segment(2)== '08')
                <a href="/print-pendaftaran/08" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak 08 Km</a>
            @elseif(Request::segment(2)== '17')
                <a href="/print-pendaftaran/17" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak 17 Km</a>
            @elseif(Request::segment(2)== '28')
                <a href="/print-pendaftaran/28" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak 28 Km</a>
            @elseif(Request::segment(2)== '75')
                <a href="/print-pendaftaran/75" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak 75 Km</a>
            @elseif(Request::segment(2)== '76')
                <a href="/print-pendaftaran/76" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak 76 Km</a>
            @elseif(Request::segment(2)== '45')
                <a href="/print-pendaftaran/45" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak 45 Km</a>
            @endif


            <hr>
            <table class="table table-hover table-bordered" id="table_id" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Pendaftaran</th>
                        <th>Nama</th>
                        <th>Kategori Jarak</th>
                        <th>Kota</th>
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
<script>
    var id = '{{$kategori_jarak}}';
    $('#table_id').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax:"{{url('getpendaftarankategori')}}/"+id,
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'no_pendaftaran', name: 'no_pendaftaran'},
            {data: 'nama', name: 'nama'},
            {data: 'kategori', name: 'kategori'},
            {data: 'kota', name: 'kota'},
            {data: 'action', name: 'action'}
        ]
    });

    $('body').on('click', '.hapus', function (event) {
    event.preventDefault();

    var user_name = $(this).attr('pendaftaran-name'),
        title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
        pendaftaran_id = $(this).attr('pendaftaran-id');
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
                url: "/pendaftaran/"+pendaftaran_id+"/delete",

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
</script>
<script>
    $(document).ready(function(){
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