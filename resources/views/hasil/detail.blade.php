
<h3>Identitas Peserta</h3>
<div class="alert alert-info">
  <table width="100%">
    <tr>
      <td width="40%"><strong>No. Pendaftaran</strong></td>
      <td width="2%">:</td>
      <td>{{$hasilgowes->nodaf}}</td>
    </tr>
    <tr>
      <td><strong>Nama Lengkap</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->nama}}</td>
    </tr>
    <tr>
      <td><strong>NIK</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->nik}}</td>
    </tr>
    
    <tr>
      <td><strong>Tanggal Lahir / Usia</strong></td>
      <td>:</td>
      <td>{{tgl_indo(substr($hasilgowes->tgl_lahir ,0,10))}} / {{umur($hasilgowes->tgl_lahir)}}</td>
    </tr>
    <tr>
      <td><strong>Jenis Kelamin</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->jenis_kelamin}}</td>
    </tr>
    
    
    <tr>
      <td><strong>No. Hp/WA </strong></td>
      <td>:</td>
      <td>{{$hasilgowes->no_hp}}</td>
    </tr>
    <tr>
      <td><strong>Kategori Jarak Tempuh</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->kategori}} Km</td>
    </tr>
    
    <tr>
      <td><strong>Aplikasi Yang digunakan</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->app_digunakan}}</td>
    </tr>
    <tr>
      <td><strong>Nama Akun Strava/Relive</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->strava}}</td>
    </tr>
    <tr>
      <td><strong>Kategori Sepeda</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->kategori_sepeda}}</td>
    </tr>
    <tr>
      <td><strong>Jenis Sepeda</strong></td>
      <td>:</td>
      <td>{{$hasilgowes->jenis_sepeda}}</td>
    </tr>
  </table>
</div>


<hr>
<h3>Hasil Gowes</h3>
<div class="alert alert-info">
  <table width="100%">
  <tr>
    <td width="40%"><strong>Tanggal Gowes</strong> </td>
    <td width="2%">:</td>
    <td>{{tgl_indo(substr($hasilgowes->tgl_gowes ,0,10))}}</td>
  </tr>
  <tr>
    <td><strong>Jarak yang ditempuh</strong></td>
    <td>:</td>
    <td>{{$hasilgowes->jarak_tempuh}}</td>
  </tr>
  <tr>
    <td><strong>Screenshoot Aplikasi Strava/Relive</strong></td>
    <td>:</td>
    <td><a href="{{asset('images/hasil_gowes/'.$hasilgowes->hasil_gowes)}}" target="_blank"><img src="{{asset('images/hasil_gowes/'.$hasilgowes->hasil_gowes)}}" width="100" class="img img-thumbnail"></a></td>
  </tr>
  </table>
</div>
<hr>
<!-- <form action="/hasil_gowes/{{$hasilgowes->id_hasil}}/update" method="post">
  {{csrf_field()}}
  <div class="form-group{{$errors->has('status') ? ' has-error':''}}">
      <label class="control-label">Status<span class="text-danger">*</span></label>                              
      <select class="form-control" name="status">
        <option value="">--Pilih--</option>
        <option value="Terpenuhi" @if($hasilgowes->status == 'Terpenuhi') selected @endif>Terpenuhi</option>
        <option value="Tidak Terpenuhi" @if($hasilgowes->status == 'Tidak Terpenuhi') selected @endif>Tidak Terpenuhi</option>
      </select>
      @if($errors->has('status'))
          <span class="text-danger">{{$errors->first('status')}}</span>
      @endif
  </div>
  <div class="form-group">
    <label class="control-label"></label>                                     
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Validasi Hasil</button>
  </div>
</form> -->
