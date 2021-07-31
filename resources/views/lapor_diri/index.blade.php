@extends('layouts.master')

@section('title')
Data Lapor Diri
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
            <h1>Data Lapor Diri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Lapor Diri</li>
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
          <h3 class="card-title">Data Lapor Diri</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            
            <hr>
            <a href="/data-lapor-diri/exportexcel" class="btn btn-success"><i class="fa fa-file-excel"></i> Export All to Excel</a><hr class="invisible"> 
            <table class="table table-hover table-bordered" id="table_id" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Umur</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Tanggal Test</th>
                        <th>Foto Bukti</th>
                        <th width="15%">Aksi</th>
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
                <h5 class="modal-title">Detail Lapor Diri</h5>
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
    $(document).ready(function(){
        $('#table_id').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.lapor_diri') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                {data: 'umur', name: 'umur'},
                {data: 'kecamatan.nama_kecamatan', name: 'nama_kecamatan'},
                {data: 'kelurahan.nama_kelurahan', name: 'nama_kelurahan'},
                {data: 'tanggal_test', name: 'tanggal_test'},
                {data: 'foto_bukti', name: 'foto_bukti'},
                {data: 'action', name: 'action'}
            ]
        });

        $('body').on('click', '.hapus', function (event) {
            event.preventDefault();

            var user_name = $(this).attr('lapor_diri-name'),
                title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
                lapor_diri_id = $(this).attr('lapor_diri-id');
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
                        url: "/data-lapor-diri/"+lapor_diri_id+"/delete",

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
                url: "/data-lapor-diri" +'/' + id +'/detail',
                dataType: 'html',
                success: function (response) {
                    $('.isi').html(response);
                }
            });

        });
    });    
    
</script>
@stop
