<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Banner;
use \App\Pendaftaran;
use \App\Hasilgowes;
use PDF;
use DB;

class SiteController extends Controller
{
    public function index(){
    	$banner = \App\Banner::where('status_aktif','Y')->whereNotIn('id', [18])->get();
        $utama = \App\Banner::where('id','18')->where('status_aktif','Y')->first();
        $status_form = \App\Formstatus::where('nama_form','sertifikat')->first();
        return view('site.index',compact(['banner','utama','status_form']));
    }

    public function pendaftaran(){
        $status_form = \App\Formstatus::where('nama_form','pendaftaran')->first();
        return view('site.pendaftaran',compact(['status_form']));
    }

    public function lapor_diri(){
        $status_form = \App\Formstatus::where('nama_form','pendaftaran')->first();
        return view('site.lapor_diri',compact(['status_form']));
    }

    //input tambah
    public function kirim(Request $request){
        $pendaftaran = Pendaftaran::where('nik',$request->nik)->first();
        //dd($pendaftaran);
        if($pendaftaran){
            return redirect()->back()->with('gagal','NIK Sudah Terdaftar');
        }
    	$this->validate($request,[
    		//identitas pendaftaran
            'nama'=>'required',
            'nik'=>'required|unique:pendaftaran|min:16',
            'email'=>'required|unique:pendaftaran',
            'tgl' => 'required', 
            'bulan' => 'required', 
            'tahun' => 'required', 
            'jenis_kelamin' => 'required', 
            'alamat_lengkap'=>'required',
            'kota'=>'required',
            'no_hp'=>'required',
            'kategori'=>'required',
            'app_digunakan'=>'required',
            'instagram'=>'required',
            'kategori_sepeda'=>'required',
            'jenis_sepeda'=>'required',
            'strava'=>'required',
            'captcha' => 'required|captcha'
        ]);

        
        $jml_inbox = jmlPendaftaran();
		$no = 1;
		if($jml_inbox > 0) {
		    $format = $request->kategori."".sprintf("%04s", abs($jml_inbox + 1));
		}
		else {
		    $format = $request->kategori."".sprintf("%04s", sprintf("%03s", $no));
		}
        $tgl_lahir = $request->tahun.'-'.$request->bulan.'-'.$request->tgl;

        DB::beginTransaction();
        try{
            $pendaftaran = new \App\Pendaftaran;
            $pendaftaran->no_pendaftaran = $format;
            $pendaftaran->nama = $request->nama;
            $pendaftaran->nik = $request->nik;
            $pendaftaran->email = $request->email;
            $pendaftaran->tgl_lahir = $tgl_lahir;
            $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
            $pendaftaran->alamat_lengkap = $request->alamat_lengkap;
            $pendaftaran->kota = $request->kota;
            $pendaftaran->no_hp = $request->no_hp;
            $pendaftaran->kategori = $request->kategori;
            $pendaftaran->instagram = $request->instagram;
            $pendaftaran->app_digunakan = $request->app_digunakan;
            $pendaftaran->strava = $request->strava;
            $pendaftaran->kategori_sepeda = $request->kategori_sepeda;
            $pendaftaran->jenis_sepeda = $request->jenis_sepeda;
            $pendaftaran->komunitas_sepeda = $request->komunitas_sepeda;
            $pendaftaran->save();

            DB::commit();
            return redirect('/pendaftaran/sukses/'.encrypt($pendaftaran->id))->with('sukses','Pendaftaran berhasil Dikirim');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
    }

    public function sukses($id){
    	$d = decrypt($id);
    	$pendaftaran = Pendaftaran::where('id',$d)->first();
        return view('site.sukses',['pendaftaran' => $pendaftaran]);
    }

    public function cetak_pendaftaran($id){
        $d = decrypt($id);
        $pendaftaran = Pendaftaran::where('id',$d)->first();

        $pdf = PDF::loadView('site.exportpdf',['pendaftaran' => $pendaftaran])->setPaper([0, 0, 450, 400],'lanscape');
        return $pdf->stream('bukti_pendaftaran_gowesvirtual_'.$pendaftaran->no_pendaftaran.'.pdf');
    }

    public function cetak_sertifikat(){
        $banner = \App\Banner::where('status_aktif','Y')->get();
        return view('site.cetak_sertifikat',['banner' => $banner]);
    }

    public function download_sertifikat(Request $r){
        $d = $r->no_peserta;
        $pendaftaran = Pendaftaran::where('no_pendaftaran',$d)->first();
        $hasil = Hasilgowes::where('no_pendaftaran',$d)->first();

        if($pendaftaran){
            if($hasil){
                $pdf = PDF::loadView('site.v_sertifikat',['pendaftaran' => $pendaftaran])->setPaper('a4','landscape');
                return $pdf->stream('sertifikat_gowesvirtual_'.$pendaftaran->no_pendaftaran.'.pdf');
            }else{
                return redirect()->back()->with('gagal','Anda Belum Melakukan Submit Hasil Gowes');
            }
            
        }else{
            return redirect()->back()->with('gagal','Nomor Peserta Tidak Terdaftar');
            // return view('site.cetak_sertifikat',['banner' => $banner]);
        }
        
    }

    public function cetak_no_peserta(Request $r){
        $no = $r->nik;
        $pendaftaran = Pendaftaran::where('nik',$no)->first();
        //dd($pendaftaran);
        if($pendaftaran == null){
            return redirect()->back()->with('gagal','NIK Belum Terdaftar');
        }else{
            $pdf = PDF::loadView('site.exportpdf',['pendaftaran' => $pendaftaran])->setPaper([0, 0, 450, 400],'lanscape');
            return $pdf->download('bukti_pendaftaran_gowesvirtual_'.$pendaftaran->no_pendaftaran.'.pdf');
        }
        
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }

}
