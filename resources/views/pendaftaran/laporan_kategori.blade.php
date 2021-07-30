<!DOCTYPE html>
<html>
<head>
    <title>Data Pendaftaran<br> Kategori {{$kateg}} Km</title>
</head>
<body>
<style>
  .ukfont{
    font-family: sans-serif;
    font-size: 9;
  }
  .font{
    font-family: sans-serif;
    font-size: 9;
  }
</style>
    <h1 align="center">Data Pendaftaran<br> Kategori {{$kateg}} Km</h1>
    
    <table class="ukfont" width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr >
            <td width="3%"><strong>No.</strong></td>
            <td><strong>No. Peserta</strong></td>
            <td width="10%"><strong>NIK</strong></td>
            <td><strong>Nama</strong></td>
            <td><strong>Tgl Lahir</strong></td>
            <td><strong>Jenis Kelamin</strong></td>
            <td><strong>No.Hp</strong></td>
            <td width="10%"><strong>instagram</strong></td>
            <td><strong>Nama Akun Strava</strong></td>
            
            
        </tr>
        <?php $no = 0; ?>
        @foreach($pendaftaran as $list)
        <?php $no++ ; ?>  
        <tr>
            <td>{{$no}}.</td>
            <td>{{$list->no_pendaftaran}}</td>
            <td>{{$list->nik}}</td>
            <td>{{$list->nama}}</td>
            <td>{{Date::parse($list->tgl_lahir)->format('j F Y')}}</td>
            <td>{{$list->jenis_kelamin}}</td>
            <td>{{$list->no_hp}}</td>
            <td>{{$list->instagram}}</td>
            <td>{{$list->strava}}</td>

        </tr>
        @endforeach
    </table>
</body>
</html>