@extends('layouts.master')
@section('title')
Koperasi | Edit User
@endsection
@section('content')
<!-- Page Header Start -->
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Page Title Start -->
                <h2 class="page--title h5">Manajemen User</h2>
                <!-- Page Title End -->

                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active"><span>Users</span></li>
                </ul>
            </div>

            
        </div>
    </div>
</section>
<!-- Page Header End -->          

<!-- Main Content Start -->
<section class="main--content">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Panel Title Here</h3>
        </div>

        <div class="panel-content">
            <div class="panel panel-default tabs"> 
                <!-- Tabs Nav Start -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab-first" data-toggle="tab" class="nav-link active">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-second" data-toggle="tab" class="nav-link">Ganti Password</a>
                    </li>

                </ul>
                <!-- Tabs Nav End -->                           
                                       
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab-first">
                    <form action="/user/{{$user->id}}/update" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('name') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                            @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{$errors->has('email') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{$errors->has('username') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" class="form-control" name="username" value="{{$user->username}}"/>
                            @if($errors->has('username'))
                                <span class="help-block">{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    @if(auth()->user()->role == 'admin')
                    <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Hak Akses</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <select name="role" class="form-control">
                            <option value="">--Pilih--</option>
                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                <option value="koperasi" @if($user->role == 'koperasi') selected @endif>Koperasi</option>
                            </select>
                            @if($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Status</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <select name="aktif" class="form-control">
                            <option value="">--Pilih--</option>
                                <option value="Y" @if($user->aktif == 'Y') selected @endif>Aktif</option>
                                <option value="N" @if($user->aktif == 'N') selected @endif>Non Aktif</option>
                            </select>
                            @if($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Photo</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="file" class="form-control" name="photo"/>
                            <img src="{{$user->getAvatar()}}" alt="" width="100px">
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
                    <div class="tab-pane" id="tab-second">
                    @if (session('errors'))
                    <div class="alert alert-danger">
                        {{ session('errors') }}
                    </div>
                    @endif
                    <form action="/user/{{$user->id}}/ganti_password" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Passoword Baru</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="password" class="form-control" name="password" required/>
                            @if($errors->has('password'))
                                <span class="help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{$errors->has('password_baru') ? ' has-error':''}}">
                        <label class="col-md-3 col-xs-12 control-label">Konfirmasi Password Baru</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="password" class="form-control" name="password_baru" required/>
                            @if($errors->has('password_baru'))
                                <span class="help-block">{{$errors->first('password_baru')}}</span>
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
            </div>                                                   
            <!-- END TABS -->
        </div>
    </div>
</section>
@endsection
@section('footer')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('sukses'))
<script type="text/javascript">
    swal("Berhasil", "{{session('sukses')}}", "success");
    </script>
@endif
@if(session('hapus'))
<script type="text/javascript">
    swal("Berhasil", "{{session('hapus')}}", "success");
    </script>
@endif

@stop