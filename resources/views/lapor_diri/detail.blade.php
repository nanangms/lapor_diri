<table width="100%" class="table-hover">
	<tr>
		<td colspan="3"><h4>A. DATA DIRI</h4></td>
	</tr>
	<tr>
		<td><b>Nama</b></td>
		<td>:</td>
		<td>{{$lapor_diri->nama}}</td>
	</tr>
	<tr>
		<td><b>NIK</b></td>
		<td>:</td>
		<td>{{$lapor_diri->nik}}</td>
	</tr>
	<tr>
		<td><b>Umur</b></td>
		<td>:</td>
		<td>{{$lapor_diri->umur}}</td>
	</tr>
	<tr>
		<td><b>Kecamatan</b></td>
		<td>:</td>
		<td>{{$lapor_diri->kecamatan->nama_kecamatan}}</td>
	</tr>
	<tr>
		<td><b>Kelurahan</b></td>
		<td>:</td>
		<td>{{$lapor_diri->kelurahan->nama_kelurahan}}</td>
	</tr>
	<tr>
		<td><b>RT</b></td>
		<td>:</td>
		<td>{{$lapor_diri->rt}}</td>
	</tr>
	<tr>
		<td><b>No. Rumah</b></td>
		<td>:</td>
		<td>{{$lapor_diri->no_rumah}}</td>
	</tr>
	<tr>
		<td><b>Alamat</b></td>
		<td>:</td>
		<td>{{$lapor_diri->alamat}}</td>
	</tr>
	<tr>
		<td><b>No. HP</b></td>
		<td>:</td>
		<td>{{$lapor_diri->no_telp}}</td>
	</tr>
	<tr>
		<td><b>Pekerjaan</b></td>
		<td>:</td>
		<td>{{$lapor_diri->pekerjaan}}</td>
	</tr>
	<tr>
		<td><b>Tanggal Test</b></td>
		<td>:</td>
		<td>{{$lapor_diri->tgl_test}}</td>
	</tr>
	<tr>
		<td><b>Tempat Test</b></td>
		<td>:</td>
		<td>{{$lapor_diri->tempat_test}}</td>
	</tr>
	<tr>
		<td><b>Foto Hasil Test</b></td>
		<td>:</td>
		<td><a href="{{asset('images/foto_test/'.$lapor_diri->foto_test)}}" target='_blank'><img src="{{asset('images/foto_test/'.$lapor_diri->foto_test)}}" width='100px'></a></td>
	</tr>
	<tr>
		<td><b>Keluhan Klinis</b></td>
		<td>:</td>
		<td>{{$lapor_diri->keluhan_klinis}}</td>
	</tr>
	<tr>
		<td><b>Penyakit yg Pernah Diderita</b></td>
		<td>:</td>
		<td>{{$lapor_diri->penyakit}}</td>
	</tr>
	<tr>
		<td><b>Riwayat</b></td>
		<td>:</td>
		<td>{{$lapor_diri->riwayat}}</td>
	</tr>
	<tr>
		<td><b>Permintaan Khusus</b></td>
		<td>:</td>
		<td>{{$lapor_diri->permintaan_khusus}}</td>
	</tr>
	<tr>
		<td><b>Status</b></td>
		<td>:</td>
		<td>{{$lapor_diri->status}}</td>
	</tr>
	<tr>
		<td><b>Lokasi Isolasi</b></td>
		<td>:</td>
		<td>{{$lapor_diri->lokasi_isolasi}}</td>
	</tr>
	<tr>
		<td colspan="3"><hr><h4>B. HASIL PEMERIKSAAN MANDIRI</h4></td>
	</tr>
	<tr>
		<td><b>Saturasi Oksigen</b></td>
		<td>:</td>
		<td>{{$lapor_diri->saturasi_oksigen}}</td>
	</tr>
	<tr>
		<td><b>Denyut Nadi</b></td>
		<td>:</td>
		<td>{{$lapor_diri->denyut_nadi}}</td>
	</tr>
	<tr>
		<td><b>Tekanan Darah</b></td>
		<td>:</td>
		<td>{{$lapor_diri->tekanan_darah}}</td>
	</tr>
	<tr>
		<td><b>Obat yang dikonsumsi</b></td>
		<td>:</td>
		<td>{{$lapor_diri->obat}}</td>
	</tr>
</table>