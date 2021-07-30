<!DOCTYPE html>
<html>
<head>
    <title>Data Hasil Gowes<br> Kategori {{$kateg}} Km</title>
</head>
<body>
    <h1 align="center">Data Hasil Gowes<br> Kategori {{$kateg}} Km</h1>
    
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr >
            <td align="center" width="3%">No.</td>
            <td align="center">No. Pendaftaran</td>
            <td align="center" width="15%">NIK / Nama</td>
            
            <td align="center" width="10%">Tgl Gowes</td>
            <td align="center">Aplikasi yg Digunakan</td>
            <td align="center">Nama Akun Strava/Relive</td>
            <td align="center">Jarak Tempuh</td>
            <td align="center" width="8%">No. HP</td>
            <td align="center">Status</td>
            
        </tr>
        <?php $no = 0; ?>
        @foreach($hasil as $list)
        <?php $no++ ; ?>  
        <tr>
            <td>{{$no}}.</td>
            <td>{{$list->no_pendaftaran}}</td>
            <td>{{$list->nik}}<br><b>{{$list->nama}}</b></td>
            
            <td>{{Date::parse($list->tgl_gowes)->format('j F Y')}}</td>
            <td>{{$list->app_digunakan}}</td>
            <td>{{$list->strava}}</td>
            <td>{{$list->jarak_tempuh}}</td>
            <td>{{$list->no_hp}}</td>
            <td>{{$list->status}}</td>

        </tr>
        @endforeach
    </table>
</body>
</html>