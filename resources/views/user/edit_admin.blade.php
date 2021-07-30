<!-- Tabs Nav Start -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#tab01" data-toggle="tab" class="nav-link active">Profil</a>
    </li>
    <li class="nav-item">
        <a href="#tab02" data-toggle="tab" class="nav-link">Ganti Password</a>
    </li>

</ul>
<!-- Tabs Nav End -->

<!-- Tab Content Start -->
<div class="tab-content">
    <!-- Tab Pane Start -->
    <div class="tab-pane fade show active" id="tab01">

        <form action="/user/{{$user->id}}/update" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                
                <div class="form-group{{$errors->has('name') ? ' has-error':''}}">
                    <label class="control-label">Nama Lengkap</label>
                                                            
                        <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                        @if($errors->has('name'))
                            <span class="help-block">{{$errors->first('name')}}</span>
                        @endif
                  
                </div>
                
                <div class="form-group{{$errors->has('email') ? ' has-error':''}}">
                    <label class="control-label">Email</label>
                                                                
                        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                        @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                   
                </div>

                <div class="form-group{{$errors->has('username') ? ' has-error':''}}">
                    <label class="control-label">Username</label>
                                                                
                        <input type="text" class="form-control" name="username" value="{{$user->username}}"/>
                        @if($errors->has('username'))
                            <span class="help-block">{{$errors->first('username')}}</span>
                        @endif
                    
                </div>
                @if(auth()->user()->role == 'superadmin')
                <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                    <label class="control-label">Hak Akses</label>
                                                                
                        <select name="role" class="form-control">
                        <option value="">--Pilih--</option>
                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                            <option value="superadmin" @if($user->role == 'superadmin') selected @endif>Superadmin</option>
                        </select>
                        @if($errors->has('role'))
                            <span class="help-block">{{$errors->first('role')}}</span>
                        @endif
                    
                </div>

                <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                    <label class="control-label">Status</label>
                                                                
                        <select name="aktif" class="form-control">
                        <option value="">--Pilih--</option>
                            <option value="Y" @if($user->aktif == 'Y') selected @endif>Aktif</option>
                            <option value="N" @if($user->aktif == 'N') selected @endif>Non Aktif</option>
                        </select>
                        @if($errors->has('role'))
                            <span class="help-block">{{$errors->first('role')}}</span>
                        @endif
                    
                </div>
                @endif
                <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                    <label class="control-label">Photo</label>
                                                                
                        <input type="file" class="form-control" name="photo"/>
                        <img src="{{$user->getAvatar()}}" alt="" width="100px">
                    
                </div>

                <div class="form-group">
                    <label class="control-label"></label>                               
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            
            </form>
    </div>
    <div class="tab-pane" id="tab02">
     <form action="/user/{{encrypt($user->id)}}/ganti_password" class="form-horizontal" method="post">
            {{csrf_field()}}
                <div class="form-group{{$errors->has('password') ? ' has-error':''}}">
                    <label class="control-label">Passoword Baru</label>
                                                                
                        <input type="password" class="form-control" name="password" required/>
                        @if($errors->has('password'))
                            <span class="help-block">{{$errors->first('password')}}</span>
                        @endif
                    
                </div>
                
                <div class="form-group{{$errors->has('password_baru') ? ' has-error':''}}">
                    <label class="control-label">Konfirmasi Password Baru</label>
                                                                
                        <input type="password" class="form-control" name="password_baru" required/>
                        @if($errors->has('password_baru'))
                            <span class="help-block">{{$errors->first('password_baru')}}</span>
                        @endif
                   
                </div>
                <div class="form-group">
                    <label class="control-label"></label>
                                                                
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
                    
                </div>
            </form>
    </div>

  </div>
