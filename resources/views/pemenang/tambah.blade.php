<!-- Basic Modal Start -->
<div id="Tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal-body">
                <form action="/user/tambah_user" class="form-horizontal" method="POST" enctype="multipart/form-data" id="basicForm">
                {{csrf_field()}}
                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">Nama</span>
                    <div class="col-lg-9">
                        <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">Email</span>
                    <div class="col-lg-9">
                        <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">Username</span>
                    <div class="col-lg-9">
                        <input type="text" name="username" id="username" value="{{old('username')}}" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">Password</span>
                    <div class="col-lg-9">
                        <input type="password" id="password" name="password" value="{{old('password')}}" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">Hak Akses</span>
                    <div class="col-lg-9">
                        <select name="role" class="form-control" id="role">
                        <option value="">--Pilih--</option>
                            <option value="admin" {{(old('role') =='admin' ) ? ' selected' : ''}}>Admin</option>
                            <option value="superadmin" {{(old('role') =='perusahaan' ) ? ' selected' : ''}}>Super Admin</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <span class="label-text col-lg-3 col-form-label text-md-right">Status</span>
                    <div class="col-lg-9">
                        <select name="aktif" class="form-control" id="aktif">
                            <option value="">--Pilih--</option>
                            <option value="Y" {{(old('status') =='Y' ) ? ' selected' : ''}}>Aktif</option>
                            <option value="N" {{(old('status') == 'N' ) ? ' selected' : ''}}>Non Aktif</option>
                        </select>
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

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Basic Modal End -->