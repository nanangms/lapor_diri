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
                        <form action="/pendaftaran/kirim" class="form-horizontal" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label "></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <span class="text-danger">* Wajib diisi</span>
                                    
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('kategori') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Kategori Jarak Tempuh <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select class="form-control select2" name="kategori" id="kategori" width="100%">
                                        <option value="">--Pilih--</option>
                                        <option value="17" @if(old("kategori") == '17') selected @endif>17 Km</option>
                                        <option value="45" @if(old("kategori") == '45') selected @endif>45 Km</option>
                                        <option value="76" @if(old("kategori") == '76') selected @endif>76 Km</option>
                                    </select>
                                    @if($errors->has('kategori'))
                                        <span class="text-danger">{{$errors->first('kategori')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('nama') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="nama" value="{{old('nama')}}" placeholder="Nama Lengkap" id="nama" />
                                    <span class="text-info"><i>Nama lengkap sesuai KTP</i></span>
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
                                    <span class="text-info"><i>satu NIK hanya bisa mendaftar untuk satu registrasi</i></span>
                                    
                                </div>
                            </div>
                            

                            <div class="form-group{{$errors->has('email') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Email <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" id="email" />
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('tgl') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Tanggal Lahir <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                
                                    <div class="col-md-4">
                                        <select class="form-control select2" name="tgl" id="tgl">
                                            <option value="">--Tanggal--</option>
                                            <?php for($a=1; $a<=31; $a+=1){ ?>
                                                <option value="{{$a}}" @if(old("tgl") == $a) selected @endif>{{$a}}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control select2" name="bulan" id="bulan">
                                            <option value="">--Bulan--</option>
                                            <option value="01" @if(old("bulan") == '01') selected @endif>Januari</option>
                                            <option value="02" @if(old("bulan") == '02') selected @endif>Februari</option>
                                            <option value="03" @if(old("bulan") == '03') selected @endif>Maret</option>
                                            <option value="04" @if(old("bulan") == '04') selected @endif>April</option>
                                            <option value="05" @if(old("bulan") == '05') selected @endif>Mei</option>
                                            <option value="06" @if(old("bulan") == '06') selected @endif>Juni</option>
                                            <option value="07" @if(old("bulan") == '07') selected @endif>Juli</option>
                                            <option value="08" @if(old("bulan") == '08') selected @endif>Agustus</option>
                                            <option value="09" @if(old("bulan") == '09') selected @endif>September</option>
                                            <option value="10" @if(old("bulan") == '10') selected @endif>Oktober</option>
                                            <option value="11" @if(old("bulan") == '11') selected @endif>November</option>
                                            <option value="12" @if(old("bulan") == '12') selected @endif>Desember</option>
                                        </select>
                                    </div>    
                                    <div class="col-md-4">
                                        <select class="form-control select2" name="tahun" id="tahun">
                                            <option value="">--Tahun--</option>
                                            <?php for($i=date('Y'); $i>=date('Y')-70; $i-=1){ ?>
                                            <option value="{{$i}}" @if(old("tahun") == $i) selected @endif>{{$i}}</option>
                                            <?php } ?>
                                        </select>

                                    </div> 
                                    @if($errors->has('tgl'))
                                        <span class="text-danger">{{$errors->first('tgl')}}</span>
                                    @endif  
                                    @if($errors->has('bulan'))
                                        <span class="text-danger">{{$errors->first('bulan')}}</span>
                                    @endif  
                                    @if($errors->has('tahun'))
                                        <span class="text-danger">{{$errors->first('tahun')}}</span>
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
                            <div class="form-group{{$errors->has('alamat_lengkap') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Alamat Lengkap <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap">{{old('alamat_lengkap')}}</textarea>
                                    @if($errors->has('alamat_lengkap'))
                                        <span class="text-danger">{{$errors->first('alamat_lengkap')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('kota') ? ' has-error':''}}">
            <label class="col-md-3 col-xs-12 control-label">Kota / Kabupaten<span class="text-danger">*</span></label>
            <div class="col-md-6 col-xs-12">           
                <select class="form-control select2" name="kota">
                    <option value="">--Pilih--</option>
                    <option value="Kota Jambi" @if(old("kota") == 'Kota Jambi') selected @endif>Kota Jambi</option>
                    <option value="Kota Sungai Penuh" @if(old("kota") == 'Kota Sungai Penuh') selected @endif>Kota Sungai Penuh</option>
                    <option value="Kabupaten Kerinci" @if(old("kota") == 'Kabupaten Kerinci') selected @endif>Kab. Kerinci</option>
                    <option value="Kabupaten Merangin" @if(old("kota") == 'Kabupaten Merangin') selected @endif>Kab. Merangin</option>
                    <option value="Kabupaten Sarolangun" @if(old("kota") == 'Kabupaten Sarolangun') selected @endif>Kab. Sarolangun</option>
                    <option value="Kabupaten Batanghari" @if(old("kota") == 'Kabupaten Batanghari') selected @endif>Kab. Batanghari</option>
                    <option value="Kabupaten Muaro Jambi" @if(old("kota") == 'Kabupaten Muaro Jambi') selected @endif>Kab. Muaro Jambi</option>
                    <option value="Kabupaten Tanjung Jabung Barat" @if(old("kota") == 'Kabupaten Tanjung Jabung Barat') selected @endif>Kab. Tanjung Jabung Barat</option>
                    <option value="Kabupaten Tanjung Jabung Timur" @if(old("kota") == 'Kabupaten Tanjung Jabung Timur') selected @endif>Kab. Tanjung Jabung Timur</option>
                    <option value="Kabupaten Bungo" @if(old("kota") == 'Kabupaten Bungo') selected @endif>Kab. Bungo</option>
                    <option value="Kabupaten Tebo" @if(old("kota") == 'Kabupaten Tebo') selected @endif>Kab. Tebo</option>
                    

                </select>
                @if($errors->has('kota'))
                    <span class="text-danger">{{$errors->first('kota')}}</span>
                @endif
            </div>
        </div>
                            
                            <div class="form-group{{$errors->has('no_hp') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">No.Handphone/WA <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="no_hp" value="{{old('no_hp')}}" placeholder="No. Handphone" id="no_hp" />
                                    @if($errors->has('no_hp'))
                                        <span class="text-danger">{{$errors->first('no_hp')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{$errors->has('lokasi') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Akun Instagram <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="instagram" value="{{old('instagram')}}" placeholder="Instagram" id="instagram" />
                                    @if($errors->has('instagram'))
                                        <span class="text-danger">{{$errors->first('instagram')}}</span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="app_digunakan" value="Strava">
                             
                            <div class="form-group{{$errors->has('strava') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Nama Akun Strava <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="strava" value="{{old('strava')}}" placeholder="Nama Akun Strava" id="strava" />
                                    @if($errors->has('strava'))
                                        <span class="text-danger">{{$errors->first('strava')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('kategori_sepeda') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Kategori Sepeda <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select name="kategori_sepeda" class="form-control select2" id="kategori_sepeda">
                                        <option value="">--Pilih--</option>
                                        <option value="Non Listrik" @if(old("kategori_sepeda") == 'Non Listrik') selected @endif>Non Listrik</option>
                                        <option value="Listrik" @if(old("kategori_sepeda") == 'Listrik') selected @endif>Listrik</option>
                                    </select>
                                    @if($errors->has('kategori_sepeda'))
                                        <span class="text-danger">{{$errors->first('kategori_sepeda')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('jenis_sepeda') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Jenis Sepeda<span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <select name="jenis_sepeda" class="form-control select2" id="jenis_sepeda">
                                        <option value="">--Pilih--</option>
                                        <option value="MTB / Sepeda Gunung" @if(old("jenis_sepeda") == 'MTB / Sepeda Gunung') selected @endif>MTB / Sepeda Gunung</option>
                                        <option value="Sepeda lipat" @if(old("jenis_sepeda") == 'Sepeda lipat') selected @endif>Sepeda lipat</option>
                                        <option value="Sepeda Balap" @if(old("jenis_sepeda") == 'Sepeda Balap') selected @endif>Sepeda Balap</option>
                                        <option value="BMX" @if(old("jenis_sepeda") == 'BMX') selected @endif>BMX</option>
                                        <option value="Sepeda Hybrid" @if(old("jenis_sepeda") == 'Sepeda Hybrid') selected @endif>Sepeda Hybrid</option>
                                        <option value="Lainnya" @if(old("jenis_sepeda") == 'Lainnya') selected @endif>Lainnya</option>
                                    </select>
                                    @if($errors->has('kategori_sepeda'))
                                        <span class="text-danger">{{$errors->first('kategori_sepeda')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('komunitas_sepeda') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label ">Nama Komunitas Sepeda</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <input type="text" class="form-control" name="komunitas_sepeda" value="{{old('komunitas_sepeda')}}" placeholder="Nama Komunitas" id="komunitas_sepeda" />
                                    @if($errors->has('komunitas_sepeda'))
                                        <span class="text-danger">{{$errors->first('komunitas_sepeda')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('captcha') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label "> </label>
                                <div class="col-md-6 col-xs-12 captcha">   
                                <span>{!! captcha_img('flat') !!}</span> <button type="button" class="btn btn-info" class="reload" id="reload"><i class="fa fa-undo"></i></button>  <br>    
                                Masukan Kode Captcha diatas <i class="text-danger">*</i>                   
                                <input type="text" class="form-control" name="captcha" value="{{old('captcha')}}" placeholder="Kode Captcha" id="captcha" />

                                    @if($errors->has('captcha'))
                                        <span class="text-danger">{{$errors->first('captcha')}}</span>
                                    @endif
                                </div>
                            </div>
                           
                         

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"></label>
                                <div class="col-md-6 col-xs-12">
                                    
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> DAFTAR</button>
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