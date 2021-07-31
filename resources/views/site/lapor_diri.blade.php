@extends('layoutsite.master')

@section('title')
Formulir
@endsection

@section('header2')
<link href="{{asset('tm/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content2')
<!--begin contact -->
<section class="section-blue">
    <!--begin container-->
    <div class="container">
    <!-- <a href="/" class="btn btn-primary">Kembali Ke Halaman Utama</a> -->
        <!--begin row-->
        <div class="row margin-bottom-50">
            <!--begin col-md-10-->
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-title white">LAPOR DIRI ISOLASI MANDIRI</h2>
                
                <div class="separator_wrapper_white">
                    <i class="icon icon-star-two grey"></i>
                </div>
        
                <div class="white">Formulir Bagi Warga yang Sedang Dalam Masa Isolasi Mandiri di Kota Jambi</div>
            </div>
            <!--end col-md-10-->
        </div>
        <!--end row-->
        
        <!--begin row-->
        <div class="row">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!--end success message -->
                        @if(session('gagal'))
                          <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-warning"></i> {{session('gagal')}}
                          </div>
                        @endif  

                        <div id="modal-body">
                            <h3 align="center">Form Lapor Diri</h3>
                            
                            <hr>
                @if($status_form->status == 'Aktif')
                        <form action="/lapor-diri/submit" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label "></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <span class="text-danger">* Wajib diisi</span>
                                    
                                </div>
                            </div>
                        <h4>A. Data Diri</h4>
                            <div class="form-group{{$errors->has('nama') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="nama" value="{{old('nama')}}" placeholder="Nama Lengkap" id="nama" />
                                    
                                    @if($errors->has('nama'))
                                        <span class="text-danger">{{$errors->first('nama')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('nik') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">NIK <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" class="form-control" name="nik" value="{{old('nik')}}" id="nik" placeholder="NIK" />
                                    @if($errors->has('nik'))
                                        <span class="text-danger">{{$errors->first('nik')}}</span><br>
                                    @endif
                                    
                                    
                                </div>
                            </div>
                            
                            <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select name="jenis_kelamin" class="form-control select2" id="jenis_kelamin">
                                        <option value="">--Pilih--</option>
                                        <option value="Laki-laki" @if(old("jenis_kelamin") == 'Laki-laki') selected @endif>Laki-laki</option>
                                        <option value="Perempuan" @if(old("jenis_kelamin") == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                        <span class="text-danger">{{$errors->first('jenis_kelamin')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('umur') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Umur <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="number" class="form-control" name="umur" value="{{old('umur')}}" id="umur" placeholder="Umur" />
                                    @if($errors->has('umur'))
                                        <span class="text-danger">{{$errors->first('umur')}}</span><br>
                                    @endif
                                    
                                    
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('kecamatan_id') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Kecamatan <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select name="kecamatan_id" class="form-control select2" id="kec">
                                        <option value="">[Pilihan]</option>
                                        @foreach($kecamatan as $kec)
                                            <option value="{{$kec->id}}">{{$kec->nama_kecamatan}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('kecamatan_id'))
                                        <span class="text-danger">{{$errors->first('kecamatan_id')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('kelurahan_id') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Kelurahan <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select name="kelurahan_id" class="form-control select2" id="kel">
                                        <option value="">[Pilihan]</option>

                                    </select>
                                    @if($errors->has('kelurahan_id'))
                                        <span class="text-danger">{{$errors->first('kelurahan_id')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('lokasi') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">RT <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="number" class="form-control" name="rt" value="{{old('rt')}}" placeholder="RT" id="rt" />
                                    @if($errors->has('rt'))
                                        <span class="text-danger">{{$errors->first('rt')}}</span>
                                    @endif
                                </div>
                            </div>
                   
                             
                            <div class="form-group{{$errors->has('no_rumah') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">No Rumah </label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="number" class="form-control" name="no_rumah" value="{{old('no_rumah')}}" placeholder="No Rumah" id="no_rumah" />
                                    @if($errors->has('no_rumah'))
                                        <span class="text-danger">{{$errors->first('no_rumah')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{$errors->has('alamat') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Alamat Lengkap <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <textarea class="form-control" name="alamat" id="alamat">{{old('alamat')}}</textarea>
                                    @if($errors->has('alamat'))
                                        <span class="text-danger">{{$errors->first('alamat')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('pekerjaan') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Pekerjaan <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="pekerjaan" value="{{old('pekerjaan')}}" placeholder="Pekerjaan" id="pekerjaan" />
                                    @if($errors->has('pekerjaan'))
                                        <span class="text-danger">{{$errors->first('pekerjaan')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('no_telp') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">No. Handphone <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="no_telp" value="{{old('no_telp')}}" placeholder="No. Hp" id="no_telp" />
                                    @if($errors->has('no_telp'))
                                        <span class="text-danger">{{$errors->first('no_telp')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                            
                            <div class="form-group{{$errors->has('hasil_gowes') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label">Foto Hasil Test Covid-19<span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="file" name="foto_test" class="form-control" required onchange="readURL(this);"/>
                                    <span style="font-style: italic;">Max: 5mb<br>
                                        format : jpg/jpeg/png</span><br>
                                    <img id="preview_gambar" src="" width="150"/>
                                    @if($errors->has('foto_test'))
                                        <span class="text-danger">{{$errors->first('foto_test')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('tgl_test') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Tanggal Test <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="date" name="tgl_test" value="{{old('tgl_test')}}" class="form-control">
                                    @if($errors->has('tgl_test'))
                                        <span class="text-danger">{{$errors->first('tgl_test')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('tempat_test') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Tempat Test<span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select name="tempat_test" class="form-control select2" id="tempat_test">
                                        <option value="">--Pilih--</option>
                                        @foreach($tempat_test as $t)
                                            <option value="{{$t->nama_tempat}}" @if(old('tempat_test') == $t->nama_tempat) selected @endif>{{$t->nama_tempat}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tempat_test'))
                                        <span class="text-danger">{{$errors->first('tempat_test')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{$errors->has('keluhan_klinis') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Keluhan Klinis <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <textarea class="form-control" name="keluhan_klinis" id="keluhan_klinis">{{old('keluhan_klinis')}}</textarea>
                                    @if($errors->has('keluhan_klinis'))
                                        <span class="text-danger">{{$errors->first('keluhan_klinis')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('penyakit') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Penyakit yg pernah diderita <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="penyakit" value="{{old('penyakit')}}" class="form-control">
                                    @if($errors->has('penyakit'))
                                        <span class="text-danger">{{$errors->first('penyakit')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('riwayat') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Riwayat/Sumber Kontak Kasus <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="riwayat" value="{{old('riwayat')}}" class="form-control">
                                    @if($errors->has('riwayat'))
                                        <span class="text-danger">{{$errors->first('riwayat')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('permintaan_khusus') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Permintaan Khusus <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <textarea class="form-control" name="permintaan_khusus" id="permintaan_khusus">{{old('permintaan_khusus')}}</textarea>
                                    @if($errors->has('permintaan_khusus'))
                                        <span class="text-danger">{{$errors->first('permintaan_khusus')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('status') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Status Keluarga<span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="status" value="{{old('status')}}" class="form-control" placeholder="kepala keluarga/suami/istri/anak/orang tua">
                                    @if($errors->has('status'))
                                        <span class="text-danger">{{$errors->first('status')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('lokasi_isolasi') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Lokasi Isolasi <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="lokasi_isolasi" value="{{old('lokasi_isolasi')}}" class="form-control" placeholder="rumah/kantor/isolasi pemerintah (sebutkan)/hotel/rs/lainnya (sebutkan)">
                                    @if($errors->has('lokasi_isolasi'))
                                        <span class="text-danger">{{$errors->first('lokasi_isolasi')}}</span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <h4>B. Hasil Pemeriksaan Mandiri</h4>
                            <div class="form-group{{$errors->has('saturasi_oksigen') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Saturasi Oksigen <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="saturasi_oksigen" value="{{old('saturasi_oksigen')}}" class="form-control" placeholder="">
                                    @if($errors->has('saturasi_oksigen'))
                                        <span class="text-danger">{{$errors->first('saturasi_oksigen')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('denyut_nadi') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Denyut Nadi <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="denyut_nadi" value="{{old('denyut_nadi')}}" class="form-control" placeholder="">
                                    @if($errors->has('denyut_nadi'))
                                        <span class="text-danger">{{$errors->first('denyut_nadi')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('tekanan_darah') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Tekanan Darah <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="tekanan_darah" value="{{old('tekanan_darah')}}" class="form-control" placeholder="">
                                    @if($errors->has('tekanan_darah'))
                                        <span class="text-danger">{{$errors->first('tekanan_darah')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('obat') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Obat yang dikonsumsi <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" name="obat" value="{{old('obat')}}" class="form-control" placeholder="">
                                    @if($errors->has('obat'))
                                        <span class="text-danger">{{$errors->first('obat')}}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="form-group{{$errors->has('captcha') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label "> </label>
                                <div class="col-md-6 col-xs-12 captcha">   
                                <span>{!! captcha_img('flat') !!}</span> <button type="button" class="btn btn-info" class="reload" id="reload"><i class="fa fa-undo"></i></button>  <br>    
                                Masukan Kode Captcha diatas <i class="text-danger">*</i>                   
                                <input type="text" class="form-control" name="captcha" value="{{old('captcha')}}" placeholder="Kode Captcha" id="captcha" />

                                    @if($errors->has('captcha'))
                                        <span class="text-danger">{{$errors->first('captcha')}}</span>
                                    @endif
                                </div>
                            </div> -->
                           
                        
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"></label>
                                <div class="col-md-6 col-xs-12">
                                    
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> KIRIM</button>
                                </div>
                            </div>

                        </form>   
                    @else

                    @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
  </div>
  <!--end container-->
        
</section>
<!--end contact-->

<!--  -->
@endsection

@section('footer2')
<script src="{{asset('jQuery-Mask/dist/jquery.mask.min.js')}}"></script>
<script src="{{asset('tm/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#nik').mask('0000000000000000');
        $('#no_hp').mask('00000 0000 0000');
        $(".select2").select2({ width: '100%' });

        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });


        $('#kec').on('change', function() {
            $("#kel option[value!='']").remove();
            var kecID = $(this).val();
            if(kecID) {
                $.ajax({
                    url: '/get_keldesa/'+kecID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      //$('#kel').empty();
                      //$('#kel').append('<option value="">--Pilih--</option>');
                      $.each(data, function(index, data) {
                          $('#kel').append('<option value="'+ data.id +'">'+ data.nama_kelurahan +'</option>');
                      });
                    }
                });
            }else{
                $('#kel').empty();
            }
        });

        
        $('#modal-btn-save').click(function (event) {
            event.preventDefault();

            $('#modal-btn-save').text('Mengirim...'); //change button text
            $('#modal-btn-save').attr('disabled',true); //set button disable
            var form = $('#modal-body form'),
                url = form.attr('action');
            form.find('.text-danger').remove();
            form.find('.form-group').removeClass('has-error');

            $.ajax({
                url: url,
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    form.trigger('reset');

                    swal("Berhasil", "Data Berhasil Disimpan", "success");
                    //$('#nameError').removeClass('d-none');
                },

                error: function (err) {
                    if (err.status == 422){
                        console.log(err.responseJSON);

                        console.warn(err.responseJSON.errors);
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                    }
                    $('#modal-btn-save').removeAttr('disabled').text('Kirim');
                }

            })
        });
        
    
    });
</script>

@endsection