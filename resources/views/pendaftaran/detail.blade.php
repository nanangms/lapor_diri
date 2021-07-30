<div class="alert alert-info">
	

<table width="100%">
	<tr>
		<td><b>No. Pendaftaran</b></td>
		<td>:</td>
		<td>{{$pendaftaran->no_pendaftaran}}</td>
	</tr>
	<tr>
		<td><b>Nama Lengkap</b></td>
		<td>:</td>
		<td>{{$pendaftaran->nama}}</td>
	</tr>
	<tr>
		<td><b>NIK</b></td>
		<td>:</td>
		<td>{{$pendaftaran->nik}}</td>
	</tr>
	<tr>
		<td><b>Email</b></td>
		<td>:</td>
		<td>{{$pendaftaran->email}}</td>
	</tr>
	<tr>
		<td><b>Tanggal Lahir / Usia</b></td>
		<td>:</td>
		<td>{{tgl_indo(substr($pendaftaran->tgl_lahir ,0,10))}} / {{umur($pendaftaran->tgl_lahir)}}</td>
	</tr>
	<tr>
		<td><b>Jenis Kelamin</b></td>
		<td>:</td>
		<td>{{$pendaftaran->jenis_kelamin}}</td>
	</tr>
	<tr>
		<td><b>Alamat Lengkap</b></td>
		<td>:</td>
		<td>{{$pendaftaran->alamat_lengkap}}</td>
	</tr>
	<tr>
		<td><b>Kota</b></td>
		<td>:</td>
		<td>{{$pendaftaran->kota}}</td>
	</tr>
	<tr>
		<td><b>No. Hp/WA</b> </td>
		<td>:</td>
		<td>{{$pendaftaran->no_hp}}</td>
	</tr>
	<tr>
		<td><b>Kategori Jarak Tempuh</b></td>
		<td>:</td>
		<td>{{$pendaftaran->kategori}} Km</td>
	</tr>
	<tr>
		<td><b>Instagram</b></td>
		<td>:</td>
		<td>{{$pendaftaran->instagram}}</td>
	</tr>

	<tr>
		<td><b>Aplikasi Yang digunakan</b></td>
		<td>:</td>
		<td>{{$pendaftaran->app_digunakan}}</td>
	</tr>
	<tr>
		<td><b>Nama Akun Strava/Relive</b></td>
		<td>:</td>
		<td>{{$pendaftaran->strava}}</td>
	</tr>
	<tr>
		<td><b>Kategori Sepeda</b></td>
		<td>:</td>
		<td>{{$pendaftaran->kategori_sepeda}}</td>
	</tr>
	<tr>
		<td><b>Jenis Sepeda</b></td>
		<td>:</td>
		<td>{{$pendaftaran->jenis_sepeda}}</td>
	</tr>
	<tr>
		<td><b>Komunitas Sepeda</b></td>
		<td>:</td>
		<td>{{$pendaftaran->komunitas_sepeda}}</td>
	</tr>

</table>
</div>