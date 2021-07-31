<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Banner;
use \App\Pendaftaran;
use \App\Hasilgowes;
use PDF;
use DB;
use \App\Kecamatan;
use \App\Tempat_test;
use \App\Lapor_diri;
use Intervention\Image\ImageManagerStatic as Image;

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
        $kecamatan = kecamatan::select('kecamatan.id','kecamatan.nama_kecamatan')->orderBy('id', 'desc')->get();
        $tempat_test = Tempat_test::orderBy('id', 'asc')->get();
        return view('site.lapor_diri',compact(['status_form','kecamatan','tempat_test']));
    }


    //input tambah
    public function submit(Request $request){
        
        $this->validate($request,[
            //identitas pendaftaran
            'nama'=>'required',
            'nik'=>'required|unique:lapor_diri|min:16',
            'jenis_kelamin'=>'required',
            'umur' => 'required', 
            'kecamatan_id' => 'required', 
            'kelurahan_id' => 'required', 
            'pekerjaan' => 'required', 
            'no_telp' => 'required', 
            'keluhan_klinis' => 'required', 
            'penyakit' => 'required', 
            'riwayat' => 'required', 
            'permintaan_khusus' => 'required', 
            'status' => 'required', 
            'lokasi_isolasi' => 'required', 
            'saturasi_oksigen' => 'required', 
            'denyut_nadi' => 'required', 
            'tekanan_darah' => 'required', 
            'obat' => 'required', 

            'alamat' => 'required', 
            'rt'=>'required',
            //'no_rumah'=>'required',

            'foto_test'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'tgl_test'=>'required',
            'tempat_test'=>'required'
        ]);

        $foto_test = $request->file('foto_test');
        $image_name1 = str_replace(' ', '_', $request->nama).'_'.kode_acak(5).'.'.$foto_test->getClientOriginalExtension();
        $image_resize = Image::make($foto_test->getRealPath());
        $image_resize->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
        $image_resize->save(public_path('images/foto_test/'.$image_name1));

        DB::beginTransaction();
        try{
            $lapor = new \App\Lapor_diri;
            $lapor->nama            = $request->nama;
            $lapor->nik             = $request->nik;
            $lapor->jenis_kelamin   = $request->jenis_kelamin;
            $lapor->umur            = $request->umur;
            $lapor->kecamatan_id    = $request->kecamatan_id;
            $lapor->kelurahan_id    = $request->kelurahan_id;
            $lapor->alamat          = $request->alamat;
            $lapor->pekerjaan       = $request->pekerjaan;
            $lapor->no_telp         = $request->no_telp;

            $lapor->keluhan_klinis    = $request->keluhan_klinis;
            $lapor->penyakit          = $request->penyakit;
            $lapor->riwayat           = $request->riwayat;
            $lapor->permintaan_khusus = $request->permintaan_khusus;
            $lapor->status            = $request->status;
            $lapor->lokasi_isolasi    = $request->lokasi_isolasi;
            $lapor->saturasi_oksigen  = $request->saturasi_oksigen;
            $lapor->denyut_nadi       = $request->denyut_nadi;
            $lapor->tekanan_darah     = $request->tekanan_darah;
            $lapor->obat              = $request->obat;

            $lapor->rt              = $request->rt;
            $lapor->no_rumah        = $request->no_rumah;
            $lapor->foto_test       = $image_name1;
            $lapor->tgl_test        = $request->tgl_test;
            $lapor->tempat_test     = $request->tempat_test;
            $lapor->save();

            DB::commit();
            return redirect('/lapor-diri/sukses')->with('sukses','Laporan berhasil Dikirim');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
    }


    public function sukses(){
        return view('site.sukses');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }

}
