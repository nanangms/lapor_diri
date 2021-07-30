<?php
use App\Pendaftaran;
use App\Hasilgowes;
use Jenssegers\Date\Date;
use \App\Pemenang;


function jmlPendaftaran(){
    return Pendaftaran::all()->count();
}

function jmlSubmit(){
    return Hasilgowes::all()->count();
}

function jml8(){
    return Pendaftaran::where('kategori','08')->count();
}
function jml17(){
    return Pendaftaran::where('kategori','17')->count();
}
function jml28(){
    return Pendaftaran::where('kategori','28')->count();
}
function jml45(){
    return Pendaftaran::where('kategori','45')->count();
}

function jml75(){
    return Pendaftaran::where('kategori','75')->count();
}

function jml76(){
    return Pendaftaran::where('kategori','76')->count();
}

function jmlfinish8(){
    $hasil = DB::table('hasil as a')->select('a.*','b.*')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori','08')->groupBy('a.no_pendaftaran')->get()->count();
    return $hasil;
}
function jmlfinish17(){
    $hasil = DB::table('hasil as a')->select('a.*','b.*')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori','17')->groupBy('a.no_pendaftaran')->get()->count();
    return $hasil;
}
function jmlfinish28(){
    $hasil = DB::table('hasil as a')->select('a.*','b.*')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori','28')->groupBy('a.no_pendaftaran')->get()->count();
    return $hasil;
}
function jmlfinish45(){
    $hasil = DB::table('hasil as a')->select('a.*','b.*')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori','45')->groupBy('a.no_pendaftaran')->get()->count();
    return $hasil;
}
function jmlfinish75(){
    $hasil = DB::table('hasil as a')->select('a.*','b.*')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori','75')->groupBy('a.no_pendaftaran')->get()->count();
    return $hasil;
}

function jmlfinish76(){
    $hasil = DB::table('hasil as a')->select('a.*','b.*')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori','76')->groupBy('a.no_pendaftaran')->get()->count();
    return $hasil;
}

function kode_acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter)-1);
    $string .= $karakter{$pos};
    }
    return $string;
}





//fungsi tangal
function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }

function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

function time_stamp($session_time,$waktuindo) 
{ 
    $time_difference = time() - $session_time ; 
    $seconds = $time_difference ; 
    $minutes = round($time_difference / 60 );
    $hours = round($time_difference / 3600 ); 
    $days = round($time_difference / 86400 ); 
    $weeks = round($time_difference / 604800 ); 
    $months = round($time_difference / 2419200 ); 
    $years = round($time_difference / 29030400 ); 

    if($seconds <= 60){
        return "$seconds Detik yang lalu"; 
    }else if($minutes <=60){
        if($minutes==1){
            return "1 Menit yang lalu"; 
        }else{
            return "$minutes Menit yang lalu"; 
        }
    }else if($hours <=24){
        if($hours==1){
            return "1 Jam yang lalu";
        }else{
            return "$hours Jam yang lalu";
        }
    }else if($days <=7){
        if($days==1){
            return "1 Hari yang lalu";
        }else{
            return "$days Hari yang lalu";
        }
    }else{
        return $waktuindo;
    } 
}

function nama_hari($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];

        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari;
    }

function tgl_indomin($tgl)
    {
        $a=substr($tgl, 0,4);
        $b=substr($tgl, 5,2);
        $c=substr($tgl, 8,9);
        $tanggal=$c.'/'.$b.'/'.$a;
        return $tanggal;
    }

function umur($tgl_lahir){
    
// ubah ke format Ke Date Time
$lahir = new DateTime($tgl_lahir);
$hari_ini = new DateTime();
    
$diff = $hari_ini->diff($lahir);
return $diff->y ." Tahun";

}

function pemenang($id){
    return Pemenang::where('kategori_pemenang_id',$id)->count();
}