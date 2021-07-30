@extends('layouts.master')

@section('title')
Edit Banner : {{$banner->nama_banner}}
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
            <h1>Edit Banner : {{$banner->nama_banner}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Banner Slide</li>
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
          <h3 class="card-title">Form Edit Banner Slide</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <form action="/banner/{{$banner->id}}/update" class="form-horizontal" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group{{$errors->has('nama_banner') ? ' has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Nama Banner</label>
                <div class="col-md-6 col-xs-12">                                            
                    <input type="text" class="form-control" name="nama_banner" value="{{$banner->nama_banner}}"/>
                    @if($errors->has('nama_banner'))
                        <span class="help-block">{{$errors->first('nama_banner')}}</span>
                    @endif
                </div>
            </div>
            

            <div class="form-group{{$errors->has('status_aktif') ? ' has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Status</label>
                <div class="col-md-6 col-xs-12">                                            
                    <select name="status_aktif" class="form-control">
                    <option value="">--Pilih--</option>
                        <option value="Y" @if($banner->status_aktif == 'Y') selected @endif>Aktif</option>
                        <option value="N" @if($banner->status_aktif == 'N') selected @endif>Non Aktif</option>
                    </select>
                    @if($errors->has('status_aktif'))
                        <span class="help-block">{{$errors->first('status_aktif')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group{{$errors->has('gambar') ? ' has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Gambar</label>
                <div class="col-md-6 col-xs-12">                                            
                    <input type="file" class="form-control" name="gambar"/>
                     @if($banner->gambar != "")
                     <img src="{{asset('images/slide/'.$banner->gambar)}}" alt="" width="100px">
                     @else
                     Belum Ada Gambar
                     @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"></label>
                <div class="col-md-6 col-xs-12">                                            
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
            
            </form>
        </div>
      </div>
  </section>
</div>


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
    $('.datatable tbody').on('click','.hapus',function (){
        var banner_id = $(this).attr('banner-id');
    var banner_name = $(this).attr('banner-name');
    var banner_name_capital = banner_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Banner : "+banner_name_capital+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/banner/"+banner_id+"/delete";
            } 
        });
    });
</script>
@stop
