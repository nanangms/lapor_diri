@extends('layoutsite.master')
@section('title')
Pendaftaran Sukses
@endsection

@section('content2')

<!--begin contact -->
<section class="section-blue">
  <!--begin container-->
  <div class="container">
    <a href="/" class="btn btn-primary">Kembali Ke Halaman Utama</a>
    <br><br>
      <!--begin row-->
      <div class="row">
        <div class="container">

          <div class="panel">
            <div class="panel-body" >
              <h2 align="center" class="text-success"><i class="fa fa-check-circle-o"></i> <br>Terima Kasih Telah Mendaftar</h2>

              <h4 align="center">No. Peserta Anda : <br><b>{{$pendaftaran->no_pendaftaran}}</b></h4>
              <p align="center"><a href="/simpan-no-pendaftaran/{{encrypt($pendaftaran->id)}}" class="btn btn-success"><i class="fa fa-save"></i> Cetak No. Peserta</a></p>
              <hr>
              <span>* Simpan dan cetak Nomor Peserta Anda sebagai bukti pendaftaran</span><br><br>
              <a href="/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

            </div>
          </div>
        </div>
      </div>
  </div>
</section>

@endsection

@section('footer2')

@endsection