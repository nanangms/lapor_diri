@extends('layouts.master')

@section('title')
Edit Pendaftaran
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
            <h1>Edit Pendaftaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/pendaftaran">Pendaftaran</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
          <h3 class="card-title">Form Edit Pendaftaran</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <form action="/daftar/{{$pendaftaran->id}}/update" class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group{{$errors->has('no_pendaftaran') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">No. Pendaftaran <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="text" class="form-control" name="no_pendaftaran" value="{{$pendaftaran->no_pendaftaran}}"/>
                
                @if($errors->has('no_pendaftaran'))
                    <span class="text-danger">{{$errors->first('no_pendaftaran')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('kategori') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Kategori Jarak Tempuh <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <select class="form-control select" name="kategori">
                    <option value="">--Pilih--</option>
                    <option value="17" @if($pendaftaran->kategori == '17') selected @endif>17 Km</option>
                    <option value="28" @if($pendaftaran->kategori == '28') selected @endif>28 Km</option>
                    <option value="75" @if($pendaftaran->kategori == '75') selected @endif>75 Km</option>
                </select>
                @if($errors->has('kategori'))
                    <span class="text-danger">{{$errors->first('kategori')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('nama') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="text" class="form-control" name="nama" value="{{$pendaftaran->nama}}"/>
                
                @if($errors->has('nama'))
                    <span class="text-danger">{{$errors->first('nama')}}</span>
                @endif
            </div>
        </div>

        <div class="form-group{{$errors->has('nik') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">NIK <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" name="nik" value="{{$pendaftaran->nik}}"/>
                @if($errors->has('nik'))
                    <span class="text-danger">{{$errors->first('nik')}}</span>
                @endif
                
                
            </div>
        </div>

        <div class="form-group{{$errors->has('email') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Email <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="email" class="form-control" name="email" value="{{$pendaftaran->email}}"/>
                @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('lokasi') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">
                <input type="date" class="form-control" name="tgl_lahir" value="{{$pendaftaran->tgl_lahir}}"/>
                
                @if($errors->has('tgl'))
                    <span class="text-danger">{{$errors->first('tgl')}}</span>
                @endif  
                                    
                
                
            </div>
        </div>
        <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <select name="jenis_kelamin" class="form-control select">
                    <option value="">--Pilih--</option>
                    <option value="Laki-laki" @if($pendaftaran->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if($pendaftaran->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{$errors->first('jenis_kelamin')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('alamat_lengkap') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Alamat Lengkap <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <textarea class="form-control" name="alamat_lengkap">{{$pendaftaran->alamat_lengkap}}</textarea>
                @if($errors->has('alamat_lengkap'))
                    <span class="text-danger">{{$errors->first('alamat_lengkap')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('kota') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Kota / Kabupaten<span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">           
                <select class="form-control select" name="kota">
                    <option value="">--Pilih--</option>
                    <option value="Kabupaten Kerinci" @if($pendaftaran->kota == 'Kabupaten Kerinci') selected @endif>Kabupaten Kerinci</option>
                    <option value="Kabupaten Merangin" @if($pendaftaran->kota == 'Kabupaten Merangin') selected @endif>Kabupaten Merangin</option>
                    <option value="Kabupaten Sarolangun" @if($pendaftaran->kota == 'Kabupaten Sarolangun') selected @endif>Kabupaten Sarolangun</option>
                    <option value="Kabupaten Batanghari" @if($pendaftaran->kota == 'Kabupaten Batanghari') selected @endif>Kabupaten Batanghari</option>
                    <option value="Kabupaten Muaro Jambi" @if($pendaftaran->kota == 'Kabupaten Muaro Jambi') selected @endif>Kabupaten Muaro Jambi</option>
                    <option value="Kabupaten Tanjung Jabung Barat" @if($pendaftaran->kota == 'Kabupaten Tanjung Jabung Barat') selected @endif>Kabupaten Tanjung Jabung Barat</option>
                    <option value="Kabupaten Tanjung Jabung Timur" @if($pendaftaran->kota == 'Kabupaten Tanjung Jabung Timur') selected @endif>Kabupaten Tanjung Jabung Timur</option>
                    <option value="Kabupaten Bungo" @if($pendaftaran->kota == 'Kabupaten Bungo') selected @endif>Kabupaten Bungo</option>
                    <option value="Kabupaten Tebo" @if($pendaftaran->kota == 'Kabupaten Tebo') selected @endif>Kabupaten Tebo</option>
                    <option value="Kota Jambi" @if($pendaftaran->kota == 'Kota Jambi') selected @endif>Kota Jambi</option>
                    <option value="Kota Sungai Penuh" @if($pendaftaran->kota == 'Kota Sungai Penuh') selected @endif>Kota Sungai Penuh</option>

                </select>
                @if($errors->has('kota'))
                    <span class="text-danger">{{$errors->first('kota')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('no_hp') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">No.Handphone/WA <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="text" class="form-control" name="no_hp" value="{{$pendaftaran->no_hp}}"/>
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{$errors->first('no_hp')}}</span>
                @endif
            </div>
        </div>
        
        <div class="form-group{{$errors->has('lokasi') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Akun Instagram</label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="text" class="form-control" name="instagram" value="{{$pendaftaran->instagram}}"/>
                @if($errors->has('instagram'))
                    <span class="text-danger">{{$errors->first('instagram')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('app_digunakan') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Aplikasi Yang Digunakan <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <select name="app_digunakan" class="form-control select">
                    <option value="">--Pilih--</option>
                    <option value="Strava" @if($pendaftaran->app_digunakan == 'Strava') selected @endif>Strava</option>
                    <option value="Relive" @if($pendaftaran->app_digunakan == 'Relive') selected @endif>Relive</option>
                </select>
                @if($errors->has('app_digunakan'))
                    <span class="text-danger">{{$errors->first('app_digunakan')}}</span>
                @endif
            </div>
        </div> 
        <div class="form-group{{$errors->has('lokasi') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Nama Akun Strava / Relive<span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="text" class="form-control" name="strava" value="{{$pendaftaran->strava}}"/>
                @if($errors->has('strava'))
                    <span class="text-danger">{{$errors->first('strava')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('kategori_sepeda') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Kategori Sepeda <span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <select name="kategori_sepeda" class="form-control select">
                    <option value="">--Pilih--</option>
                    <option value="Non Listrik" @if($pendaftaran->kategori_sepeda == 'Non Listrik') selected @endif>Non Listrik</option>
                    <option value="Listrik" @if($pendaftaran->kategori_sepeda == 'Listrik') selected @endif>Listrik</option>
                </select>
                @if($errors->has('kategori_sepeda'))
                    <span class="text-danger">{{$errors->first('kategori_sepeda')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('jenis_sepeda') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Jenis Sepeda<span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">                                            
                <select name="jenis_sepeda" class="form-control select">
                    <option value="">--Pilih--</option>
                    <option value="MTB / Sepeda Gunung" @if($pendaftaran->jenis_sepeda == 'MTB / Sepeda Gunung') selected @endif>MTB / Sepeda Gunung</option>
                    <option value="Sepeda lipat" @if($pendaftaran->jenis_sepeda == 'Sepeda lipat') selected @endif>Sepeda lipat</option>
                    <option value="Sepeda Balap" @if($pendaftaran->jenis_sepeda == 'Sepeda Balap') selected @endif>Sepeda Balap</option>
                    <option value="BMX" @if($pendaftaran->jenis_sepeda == 'BMX') selected @endif>BMX</option>
                    <option value="Sepeda Hybrid" @if($pendaftaran->jenis_sepeda == 'Sepeda Hybrid') selected @endif>Sepeda Hybrid</option>
                    <option value="Lainnya" @if($pendaftaran->jenis_sepeda == 'Lainnya') selected @endif>Lainnya</option>
                </select>
                @if($errors->has('kategori_sepeda'))
                    <span class="text-danger">{{$errors->first('kategori_sepeda')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group{{$errors->has('komunitas_sepeda') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Nama Komunitas Sepeda</label>
            <div class="col-md-6 col-xs-12">                                            
                <input type="text" class="form-control" name="komunitas_sepeda" value="{{$pendaftaran->komunitas_sepeda}}"/>
                @if($errors->has('komunitas_sepeda'))
                    <span class="text-danger">{{$errors->first('komunitas_sepeda')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"></label>
            <div class="col-md-6 col-xs-12">                                            
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
            </div>
        </div>

    </form>  
        </div>
      </div>
  </section>
</div>





@endsection
@section('footer')

@stop

