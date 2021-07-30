@extends('layouts.master')

@section('title')
Banner Slide
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
            <h1>Banner Slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Banner Slide</li>
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
          <h3 class="card-title">Data Banner Slide</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <button class="btn btn-info" data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Tambah</button><hr>
            <table class="table datatable table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 0; ?>
            @foreach ($banner as $list)
            <?php $no++ ; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->nama_banner }}</td>
                    <td><a href="{{asset('images/slide/'.$list->gambar)}}" target="_blank" title=""><img src="{{asset('images/slide/'.$list->gambar)}}" alt="" width="100px"></a></td>
                    <td>{{ $list->status_aktif }}</td>
                    <td><a href="/banner/{{$list->id}}/edit" class="btn btn-warning btn-sm"  title="Edit"><i class="fa fa-edit"></i> Edit</a> 
                    <button class="btn btn-danger btn-sm hapus" banner-name="{{$list->nama_banner}}" banner-id="{{$list->id}}"><i class="fa fa-trash"></i> Hapus</button>
                </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
  </section>
</div>

<!-- Basic Modal Start -->
<div id="Tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Banner</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal-body">
                <form action="/banner/tambah" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('nama_banner') ? ' has-error':''}}">
                        <label class="control-label">Nama Banner</label>                                   
                            <input type="text" class="form-control" name="nama_banner" value="{{old('nama_banner')}}"/>
                            @if($errors->has('nama_banner'))
                                <span class="text-danger">{{$errors->first('nama_banner')}}</span>
                            @endif
                    </div>
                    
                    <div class="form-group{{$errors->has('status_aktif') ? ' has-error':''}}">
                        <label class="control-label">Status</label>                          
                            <select name="status_aktif" class="form-control">
                            <option value="">--Pilih--</option>
                                <option value="Y" {{(old('status_aktif') =='Y' ) ? ' selected' : ''}}>Aktif</option>
                                <option value="N" {{(old('status_aktif') == 'N' ) ? ' selected' : ''}}>Non Aktif</option>
                            </select>
                            @if($errors->has('status_aktif'))
                                <span class="text-danger">{{$errors->first('status_aktif')}}</span>
                            @endif
                    </div>

                    <div class="form-group{{$errors->has('gambar') ? ' has-error':''}}">
                        <label class="control-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label"></label>                                     
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
  

<div class="modal bounceIn animated" id="ShowEDIT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Banner</h4>
      </div>
      <div class="modal-body">
        <div class="isi"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
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
    $('.datatable').DataTable({

    });


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





