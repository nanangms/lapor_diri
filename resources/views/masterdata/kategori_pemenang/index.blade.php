@extends('layouts.master')

@section('title')
Data Kategori Pemenang
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
            <h1>Kategori Pemenang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Kategori Pemenang</li>
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
          <h3 class="card-title">Data Kategori Pemenang</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <a href="{{ route('kategori_pemenang.create') }}" class="btn btn-info pull-right modal-show" style="margin-top: -8px;" title="Tambah Kategori Pemenang"><i class="fa fa-plus"></i> Tambah</a>
            <hr>
            <table id="datatable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori Pemenang</th>
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



@include('layouts._modal')
@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('ad/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script>
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.kategori_pemenang') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama_kat_pemenang', name: 'nama_kat_pemenang'},
            {data: 'action', name: 'action'}
        ]
    });
</script>
    
@stop





















