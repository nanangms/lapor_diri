@extends('layoutsite.master')

@section('title')
Submit Hasil Gowes Virtual
@endsection

@section('content2')
<!--begin contact -->
<section class="section-blue">
    
    <!--begin container-->
    <div class="container">
    <a href="/" class="btn btn-primary">Kembali Ke Halaman Utama</a>
        <!--begin row-->
        <div class="row margin-bottom-50">
        
            <!--begin col-md-10-->
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-title white">Submit Hasil Gowes</h2>
                
                <div class="separator_wrapper_white">
                    <i class="icon icon-star-two grey"></i>
                </div>
        
                <!-- <p class="section-subtitle white">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p> -->
            </div>
            <!--end col-md-10-->
        
        </div>
        <!--end row-->
        
        <!--begin row-->
        <div class="row">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            <span class="text-danger"><b><i>Submit Hasil Gowes dilakukan pada tanggal 7 – 25 Agustus 2021 setelah anda selesai gowes (diluar tanggal tersebut maka dianggap tidak sah)</i></b></span><br><br>
                            Sebelum mengumpulkan, perhatikan ketentuan dibawah ini:<br>
                            - Pastikan NIK kamu sudah terdaftar Sebagai Peserta Gowes Virtual <i>(Jika Terdaftar maka akan muncul informasi peserta dan form untuk upload hasil gowes)</i><br>
                            - siapkan Screenshoot Bukti Hasil Gowes dari aplikasi Strava<br>
                            - Upload Hasil Gowes Hanya Bisa dilakukan satu kali (Pastikan Data Anda Benar dan Sesuai Ketentuan)<br>
                            - Pastikan Anda telah mengikuti Syarat dan Ketentuan Gowes Virtual Merdeka 76 
                           
                        </p>
                        <hr>
                        
                        @if(session('gagal'))
                          <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-warning"></i> {{session('gagal')}}
                          </div>
                        @endif
            @if($status_form->status == 'Aktif')
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">NIK <span class="text-danger">*</span></label>
                                <div class="col-md-6 col-xs-12 text-center">
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" />
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"></label>
                                <div class="col-md-6 col-xs-12 text-center">
                                    
                                    <button class="btn btn-primary btn-block" id="cek_nik" type="button"><i class="fa fa-search"></i> Cek</button>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="alert alert-danger">
                            <h2 align="center" style="color: white"><i class="fa fa-warning"></i> BATAS WAKTU UPLOAD BERAKHIR!</h2>
                        </div>   -->

                        <br><br>

                        <div id="notfound">
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i> Nomor NIK Anda Belum Terdaftar sebagai Peserta Gowes
                            </div>
                        </div>
                        <div id="form-pendaftaran">
                            <div class="alert alert-info">
                                <b>Informasi Peserta</b>
                                <hr>
                                Nama : <span id="nama"></span><br>
                                Kategori Gowes : <span id="kategori"> Km</span><br>
                                Tanggal Lahir : <span id="tgl_lahir"></span><br>
                                Jenis Kelamin : <span id="jenis_kelamin"></span>
                            </div>

                            <span class="text-danger">* Wajib <br>
                                ** Peserta Hanya bisa Upload satu kali untuk No.Pendaftaran dan NIK yang sama
                            </span><br>
                            <hr>   
                            <h2 align="center">Form Upload Hasil Gowes Virtual</h2>
                            
                            <form action="/kirim-hasil-gowes/kirim" class="form-horizontal" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group{{$errors->has('no_pendaftaran') ? ' has-error':''}}">
                                    <label class="col-md-3 col-xs-12 control-label">No.Pendaftaran <span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <input type="text" class="form-control" name="no_pendaftaran" value="{{old('no_pendaftaran')}}" id="nodaftar" readonly />
                                        <input type="hidden" class="form-control" name="nikinput" value="{{old('nikinput')}}" id="nikinput" />
                                        @if($errors->has('no_pendaftaran'))
                                            <span class="text-danger">{{$errors->first('no_pendaftaran')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{$errors->has('tgl_gowes') ? ' has-error':''}}">
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Gowes<span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <input type="date" class="form-control" name="tgl_gowes" value="{{old('tgl_gowes')}}"/>
                                        @if($errors->has('tgl_gowes'))
                                            <span class="text-danger">{{$errors->first('tgl_gowes')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{$errors->has('jarak_tempuh') ? ' has-error':''}}">
                                    <label class="col-md-3 col-xs-12 control-label">Hasil Jarak yang ditempuh (Km)<span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <input type="text" class="form-control" name="jarak_tempuh" value="{{old('jarak_tempuh')}}"/>
                                        <span style="font-style: italic;">contoh: 17,5 Km</span>
                                        @if($errors->has('jarak_tempuh'))
                                            <span class="text-danger">{{$errors->first('jarak_tempuh')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{$errors->has('hasil_gowes') ? ' has-error':''}}">
                                    <label class="col-md-3 col-xs-12 control-label">Screenshoot Hasil Gowes (Dari Aplikasi Strava/Relive)<span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <input type="file" name="hasil_gowes" class="form-control" required onchange="readURL(this);"/>
                                        <span style="font-style: italic;">Max: 5mb<br>
                                            format : jpg/jpeg/png</span><br>
                                        <img id="preview_gambar" src="" width="150"/>
                                        @if($errors->has('hasil_gowes'))
                                            <span class="text-danger">{{$errors->first('hasil_gowes')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{$errors->has('captcha') ? ' has-error':''}}">
                                <label class="col-md-3 col-xs-12 control-label "></label>
                                <div class="col-md-6 col-xs-12 captcha">   
                                <span>{!! captcha_img('flat') !!}</span> <button type="button" class="btn btn-info" class="reload" id="reload"><i class="fa fa-undo"></i></button> <br>
                                Masukan Kode Captcha <span class="text-danger">*</span>                             
                                <input type="text" class="form-control" name="captcha" value="{{old('captcha')}}" placeholder="Kode Captcha" id="captcha" />

                                    @if($errors->has('captcha'))
                                        <span class="text-danger">{{$errors->first('captcha')}}</span>
                                    @endif
                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Kirim</button>
                                    </div>
                                </div>

                            </form>  
                        </div> 
                    @else

                    @endif                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer2')
<script src="{{asset('jQuery-Mask/dist/jquery.mask.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#nik').mask('0000000000000000');
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    });
</script>

<script>
  function readURL(input) { // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
      var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
      reader.onload = function (e) { // Mulai pembacaan file
        $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
        .attr('src', e.target.result)
        .width(100); // Menentukan lebar gambar preview (dalam pixel)
  //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
        };
   
    reader.readAsDataURL(input.files[0]);
    }
  }

  
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#form-pendaftaran").hide();
        $("#notfound").hide();

        $("#cek_nik").click(function(e){
            var nik = $("#nik").val();
            $.ajax({
                url:"/cek-pendaftaran/"+nik,
                success:function(data){
                    
                    $("#form-pendaftaran").slideUp(500).slideDown(500);
                    $("#notfound").slideUp(500);
                    $("#nama").text(data.nama);
                    $("#nodaftar").val(data.no_pendaftaran);
                    $("#nikinput").val(data.nik);
                    $("#tgl_lahir").text(data.tgl_lahir);
                    $("#jenis_kelamin").text(data.jenis_kelamin);
                    $("#kategori").text(data.kategori);
                    
                },
                error:function(){
                  
                    $("#nik").text(nik);  
                    $("#notfound").slideUp(500).slideDown(500);
                    $("#form-pendaftaran").slideUp(500);
                    
                    
                }
            });
        });
    }); 

</script>
@endsection