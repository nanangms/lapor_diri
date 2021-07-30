@extends('layoutsite.master')

@section('title')
Home
@endsection

@section('content2')
<!--begin home_wrapper -->
    <section id="home" class="section-white">
        <a href="/"><img src="{{asset('images/slide/'.$utama->gambar)}}" alt="" width="100%"></a>
    </section>
    <!--end home_wrapper -->
    <!--begin image-section -->
    <section class="image-section" id="pendaftaran">
    
        <!--begin image-overlay -->
        <div class="image-overlay"></div>
        <!--end image-overlay -->
            
        <!--begin container-->
        <div class="container image-section-inside">

            <!--begin row-->
            <div class="row">
            
                <!--begin col-md-6-->
                <div class="col-md-10 col-md-offset-1 text-center margin-top-110 margin-bottom-140">
                
                    <h2 class="small-title white">Gowes Virtual Merdeka 76<br>Event Gowes Virtual Terbesar di Provinsi Jambi</h2>
                
                    <p class="section-subtitle white">
                    Pemerintah Kota Jambi bersama SKK Migas dan K3S Wilayah Jambi menggelar event gowes terbesar, Gowes Virtual Merdeka 76 dalam rangka merayakan Kemerdekaan Indonesia.<br> Semarakkan hari kemerdekaan 76 Tahun Indonesia dengan berolahraga, gowes virtual bersama keluarga maupun kerabat.<br>
                    Tetap disiplin, Patuhi protokol kesehatan Selalu Menggunakan Masker, Cuci Tangan dan Menjaga Jarak. <br>
                    Salam sehat, Salam Dua Pedal <br>Merdeka.....!!! <br>
                Pendaftaran dimulai Tanggal 01 – 17 Agustus 2021</p>
                    
                    <a href="/pendaftaran-gowes" class="btn btn-lg btn-blue margin-top-20 scrool">DAFTAR DISINI!</a>
                    
                </div>
                <!--end col-md-6-->
            
            </div>
            <!--end row-->
            
        </div>
        <!--end container-->    
        
    </section>
    <!--end image-section -->
    
    
    <!--begin portfolio -->
    <section class="section-white portfolio-padding" id="syarat">
        
        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row margin-bottom-50">
            
                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <h2 class="section-title">Informasi</h2>
                
                    <div class="separator_wrapper">
                        <i class="icon icon-star-two blue"></i>
                    </div>
            
                    <!-- <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p> -->
                </div>
                <!--end col-md-12-->
            
            </div>
            <!--end row-->
        
            <!--begin row-->
            <div class="row">
                @foreach($banner as $ban)
                <!--begin col-sm-4-->
                <div class="col-sm-4 wow fadeIn" data-wow-delay="0.15s">
                    
                    <!--begin popup-gallery-->
                    <div class="popup-gallery first-gallery portfolio-pic">
                        <a class="popup2" href="{{asset('images/slide/'.$ban->gambar)}}"><img src="{{asset('images/slide/'.$ban->gambar)}}" class="width-100" alt="pic"><span class="eye-wrapper"><i class="icon icon-cursor-move eye-icon" style="font-size: 38px;"></i></span></a>
                    </div>
                    <!--end popup-gallery-->
                    
                </div>
                <!--end col-sm-4-->
                @endforeach
            </div>
            <!--end row-->
        
            
        
        </div>
        <!--end container-->
    
    </section>
    <!--end portfolio-->
    <!--begin section-blue -->
    <section class="section-blue no-padding-bottom" id="hasil_gowes">
        
        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">
            
                <!--begin col-md-6-->
                <div class="col-md-8 margin-top-10 margin-bottom-30">
                
                    <h3 class="medium-title white">Submit Hasil Gowes Virtual</h3>
                    
                  
                    <p class="white">
                            <span class="text-danger"><b><i>Submit Hasil Gowes dilakukan pada tanggal 7 – 25 Agustus 2021 setelah anda selesai gowes</i></b></span><br><br>
                            Sebelum mengirim, perhatikan ketentuan dibawah ini:<br>
                            - Pastikan NIK kamu sudah terdaftar Sebagai Peserta Gowes Virtual <i>(Jika Terdaftar maka akan muncul informasi peserta dan form untuk upload hasil gowes)</i><br>
                            - siapkan Screenshoot Bukti Hasil Gowes dari aplikasi Strava<br>
                            - Upload Hasil Gowes Hanya Bisa dilakukan satu kali (Pastikan Data Anda Benar dan Sesuai Ketentuan)<br>
                            - Pastikan Anda telah mengikuti Syarat dan Ketentuan Gowes Virtual 
                           
                        </p>
                 

                    <a href="/kirim-hasil-gowes" class="btn btn-lg btn-white small">Kirim Hasil Gowes DISINI</a>
                    
                </div>
                <!--end col-sm-6-->
            
                <!--begin col-md-6-->
                <div class="col-md-4" style="margin-top: 70px;">
                    <img src="{{asset('images/finish.jpg')}}" class="width-100" alt="imac">
                </div>
                <!--end col-sm-6-->
                
            </div>
            <!--end row-->
    
        </div>
        <!--end container-->
    
    </section>
    <!--end section-blue-->
    
    <!--begin section-white -->
    <section class="section-white medium-padding" id="piagam">
        
        <!--begin container-->
        <div class="container">
            <!--begin row-->
            <div class="row margin-bottom-50">
            
                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <h2 class="section-title">Sertifikat Gowes</h2>
                
                    <div class="separator_wrapper">
                        <i class="icon icon-star-two blue"></i>
                    </div>
            
                    <p class="section-subtitle">Sertifikat dapat dicetak setelah Anda menyelesaikan Gowes dan  Melakukan Submit Hasil Gowes</p>
                </div>
                <!--end col-md-12-->
            
            </div>
            <!--end row-->

            <!--begin row-->
            <div class="row">
            
                <!--begin col-md-6-->
                <div class="col-md-12 margin-bottom-30">
                    @if($status_form->status == 'Aktif')
                    <form action="/download-sertifikat" method="GET" class="form-horizontal">
                     
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">No. Peserta</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" class="form-control" name="no_peserta" id="no_peserta" placeholder="xxxxxx" required/>
                                    
                                </div>
                            </div>
                      
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"></label>
                                <div class="col-md-6 col-xs-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-download"></i> Cetak Sertifikat</button>
                                </div>
                            </div>
                      
                    </form>
                    @else
                    <h2 align="center">Coming Soon</h2>
                    @endif    
                </div>
                <!--end col-sm-6-->
                
                
            
            </div>
            <!--end row-->
    
        </div>
        <!--end container-->
    
    </section>
    
    <!--begin section-white -->
    <section class="section-dark medium-padding" id="nomor_peserta">
        
        <!--begin container-->
        <div class="container">
            <!--begin row-->
            <div class="row margin-bottom-50">
            
                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <h2 class="section-title grey">Cetak Nomor Peserta</h2>
                
                    <div class="separator_wrapper">
                        <i class="icon icon-star-two grey"></i>
                    </div>
            
                    <p class="section-subtitle">Untuk anda yang lupa mencetak nomor peserta anda. Silahkan masukan NIK anda</p>
                </div>
                <!--end col-md-12-->
            
            </div>
            <!--end row-->

            <!--begin row-->
            <div class="row">
            
                <!--begin col-md-6-->
                <div class="col-md-12 margin-bottom-30">
                    <form action="/cetak-no-peserta" method="POST" class="form-horizontal">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label white">NIK</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"></label>
                                <div class="col-md-6 col-xs-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-download"></i> Cetak No. Peserta</button>
                                </div>
                            </div>
                    </form>
                       
                </div>
                <!--end col-sm-6-->
                
                
            
            </div>
            <!--end row-->
    
        </div>
        <!--end container-->
    
    </section>
    
@endsection

@section('footer2')
<script src="{{asset('jQuery-Mask/dist/jquery.mask.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#nik').mask('0000000000000000');
        $('#no_peserta').mask('000000');
    });
</script>
@endsection