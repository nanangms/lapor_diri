<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use DB;
use App\Hasilgowes;
use App\Pendaftaran;
use DataTables;
use Intervention\Image\ImageManagerStatic as Image;
use Jenssegers\Date\Date;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Kategori08Export;
use App\Exports\Kategori17Export;
use App\Exports\Kategori45Export;
use App\Exports\Kategori75Export;
use App\Exports\Kategori76Export;

class HasilgowesController extends Controller
{
	public function index(){
        $status_form = \App\Formstatus::where('nama_form','hasil_gowes')->first();
        return view('site.hasil_gowes',compact(['status_form']));
    }

    public function data_submit(){
        $banner = \App\Banner::where('status_aktif','Y')->get();
        return view('site.data_submit',['banner' => $banner]);
    }

    public function create(Request $request){
    	$this->validate($request,[
    		//identitas pendaftaran
            'no_pendaftaran'=>'required',
            'nikinput'=>'required',
            'tgl_gowes'=>'required',
            'jarak_tempuh' => 'required', 
            'hasil_gowes'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'captcha' => 'required|captcha'
        ]);
        $cek = Pendaftaran::where('no_pendaftaran',$request->no_pendaftaran)->where('nik',$request->nikinput)->count();
        
        if($cek < 1){
        	return redirect('/kirim-hasil-gowes')->with('gagal','No. Pendaftaran '.$request->no_pendaftaran.' dan '.$request->nikinput.' Tidak Terdaftar Sebagai Peserta');
        }

        $exist = Hasilgowes::where('no_pendaftaran',$request->no_pendaftaran)->first();
        if(empty($exist)){
 
            $hasil_gowes = $request->file('hasil_gowes');
     	    $image_name1 = $request->no_pendaftaran.'_'.kode_acak(5).'.'.$hasil_gowes->getClientOriginalExtension();
     	

            if ($request->hasFile('hasil_gowes')) {
                $image_resize = Image::make($hasil_gowes->getRealPath());
    		    $image_resize->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
    		    $image_resize->save(public_path('images/hasil_gowes/'.$image_name1));

                DB::beginTransaction();
                try{
                    $hasil = new \App\Hasilgowes;
                    $hasil->no_pendaftaran = $request->no_pendaftaran;
                    $hasil->tgl_gowes = $request->tgl_gowes;
                    $hasil->jarak_tempuh = $request->jarak_tempuh;
                    $hasil->hasil_gowes = $image_name1;
                    $hasil->save();

                    DB::commit();
                    return redirect('/kirim-hasil-gowes/sukses')->with('sukses','Hasil Gowes berhasil Dikirim');
                }catch (\Exception $e){
                    DB::rollback();
                    return redirect()->back()->with('gagal','Data Gagal Diinput');
                }

            }

        }else{
            return redirect('/kirim-hasil-gowes')->with('gagal','Hasil Gowes dengan No. Peserta '.$request->no_pendaftaran.' Sudah di submit, anda hanya bisa satu kali submit');
        }
    }

    public function sukses(){
        return view('site.sukses_hasil_gowes');
    }

    public function list_hasil(){
        return view('hasil.list');
    }

    public function dataTable()
    {
        $hasil = DB::table('hasil as a')
        ->select('a.*','b.nama','a.id as id_hasil','a.created_at as tgl_kirim')
        ->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')
        ->groupBy('id_hasil')
        ->orderBy('id_hasil','asc')->get();
        return DataTables::of($hasil)
            ->addColumn('action', function ($hasil) {
                if(auth()->user()->role == 'superadmin'){
                    return '<button data-toggle="modal" data-target-id="'.$hasil->id_hasil.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$hasil->id_hasil.'" class="btn btn-warning btn-sm editHasil" title="Edit"><i class="fa fa-edit"></i> Ubah Status</a>
                    <button class="btn btn-danger btn-sm hapus" hasil-name="'.$hasil->nama.'" hasil-id="'.$hasil->id_hasil.'"><i class="fa fa-trash"></i> Hapus</button>';
                }else{
                    return '<button data-toggle="modal" data-target-id="'.$hasil->id_hasil.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button> 
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$hasil->id_hasil.'" class="btn btn-warning btn-sm editHasil" title="Edit"><i class="fa fa-edit"></i> Ubah Status</a>';
                }
                    
            })
            ->addColumn('nama', function ($hasil) {
                return $hasil->nama;
            })
            ->addColumn('tgl_kirim', function ($hasil) {
                return tgl_indo(substr($hasil->tgl_kirim ,0,10));
            })
            ->addColumn('tgl_gowes', function ($hasil) {
                return tgl_indo(substr($hasil->tgl_gowes ,0,10));
            })
            ->addColumn('foto', function ($hasil) {
                return '<a href="'.asset('images/hasil_gowes/'.$hasil->hasil_gowes).'" target="_blank"><img src="'.asset('images/hasil_gowes/'.$hasil->hasil_gowes).'" width="100" class="img img-thumbnail"></a>';
            })
            ->addColumn('stat', function ($hasil) {
                if($hasil->status == 'Terpenuhi'){
                    return '<span class="badge badge-success"><i class="fa fa-check"></i> Terpenuhi</span>';
                }elseif($hasil->status == 'Tidak Terpenuhi'){
                    return '<span class="badge badge-danger"><i class="fa fa-times"></i> Tidak Terpenuhi</span>';
                }else{
                    return '<span class="badge badge-info"><i class="fa fa-exclamation"></i> Belum Diverifikasi</span>';
                }
                
            })
            ->addIndexColumn()
            ->rawColumns(['action','tgl_gowes','nama','tgl_kirim','stat','foto'])
            ->make(true);
    }

    public function dataHasil()
    {
        $hasil = DB::table('hasil as a')
        ->leftjoin('pendaftaran as b','a.no_pendaftaran','=','b.no_pendaftaran')
        ->select('a.*','b.nama','b.kota','b.kategori')
        ->groupBy('a.id')
        ->orderBy('a.id','asc')->get();
        //$hasil=Hasilgowes::query();
        //$hasil = Hasilgowes::select('hasil.*')->with('pendaftaran');
        return DataTables::of($hasil)
            
            ->addColumn('nama', function ($hasil) {
                return $hasil->nama;
            })
            ->addColumn('tgl_gowes', function ($hasil) {
                return tgl_indo(substr($hasil->tgl_gowes ,0,10));
            })
            ->addColumn('kategori', function ($hasil) {
                return $hasil->kategori.' Km';
            })
            ->addIndexColumn()
            ->rawColumns(['kategori','tgl_gowes','nama'])
            ->make(true);
    }
    

    public function detail($id){
        $hasilgowes = DB::table('hasil as a')->select('a.*','b.*','a.id as id_hasil','a.no_pendaftaran as nodaf')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('a.id',$id)->first();
        return view('hasil.detail',['hasilgowes' => $hasilgowes]);
    }

    public function update(Request $request,Hasilgowes $hasilgowes){
        $hasilgowes->update($request->all());
        return redirect()->back()->with('sukses','Data Berhasil diupdate');
    }

    public function delete(Hasilgowes $hasilgowes){
        $hasilgowes->delete();
        File::delete('images/hasil_gowes/'.$hasilgowes->hasil_gowes);
        File::delete('images/photo_gowes/'.$hasilgowes->photo_gowes);
    }

    public function data_kategori($kategori){
        $kategori_jarak = $kategori;
        return view('hasil.kategori',['kategori_jarak' => $kategori_jarak]);
    }

    public function getdatalaporankategori($kategori)
    {

        $hasil = DB::table('hasil as a')
        ->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')
        ->select('a.*','b.nama','a.id as id_hasil','a.created_at as tgl_kirim')
        ->where('b.kategori',$kategori)
        ->groupBy('id_hasil')
        ->orderBy('id_hasil','asc')->get();
        return DataTables::of($hasil)
            ->addColumn('action', function ($hasil) {
                if(auth()->user()->role == 'superadmin'){
                    return '<button data-toggle="modal" data-target-id="'.$hasil->id_hasil.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$hasil->id_hasil.'" class="btn btn-warning btn-sm editHasil" title="Edit"><i class="fa fa-edit"></i> Ubah Status</a>
                    <button class="btn btn-danger btn-sm hapus" hasil-name="'.$hasil->nama.'" hasil-id="'.$hasil->id_hasil.'"><i class="fa fa-trash"></i> Hapus</button>';
                }else{
                    return '<button data-toggle="modal" data-target-id="'.$hasil->id_hasil.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$hasil->id_hasil.'" class="btn btn-warning btn-sm editHasil" title="Edit"><i class="fa fa-edit"></i> Ubah Status</a>';
                }
                    
            })
            ->addColumn('nama', function ($hasil) {
                return $hasil->nama;
            })
            ->addColumn('tgl_gowes', function ($hasil) {
                return tgl_indo(substr($hasil->tgl_gowes ,0,10));
            })
            ->addColumn('tgl_kirim', function ($hasil) {
                return $hasil->tgl_kirim;
            })
            ->addColumn('stat', function ($hasil) {
                if($hasil->status == 'Terpenuhi'){
                    return '<span class="badge badge-success">Terpenuhi</span>';
                }elseif($hasil->status == 'Tidak Terpenuhi'){
                    return '<span class="badge badge-danger">Tidak Terpenuhi</span>';
                }else{
                    return '<span class="badge badge-warning">Belum Diverifikasi</span>';
                }
                
            })
            ->addIndexColumn()
            ->rawColumns(['action','tgl_gowes','nama','tgl_kirim','stat'])
            ->make(true);
    }

    public function cetak_laporan_kategori($kategori) 
    {   Date::setLocale('id');
        $kateg = $kategori;
        // $laporan = Pendaftaran::where('kecamatan_id',$id)->orderby('id','ASC')->get();
        $hasil = DB::table('hasil as a')
        ->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')
        ->select('a.*','b.nama','b.nik','b.app_digunakan','b.strava','b.no_hp','a.id as id_hasil','a.created_at as tgl_kirim')
        ->where('b.kategori',$kategori)
        ->groupBy('a.no_pendaftaran')
        ->orderBy('id_hasil','asc')->get();

        // $hasil = DB::table('hasil as a')->select('a.*','b.*','a.id as id_hasil')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori',$kategori)->orderby('id_hasil','ASC')->get();

        $pdf = PDF::loadView('hasil.laporan_kategori',['hasil' => $hasil,'kateg' => $kateg])->setPaper('legal','landscape');

        return $pdf->stream('cetak_hasilgowes_kategori_'.$kategori.'.pdf');
    }

    public function export08() 
    {
        return Excel::download(new Kategori08Export, 'HasilGowes08.xlsx');
    }
    public function export17() 
    {
        return Excel::download(new Kategori17Export, 'HasilGowes17.xlsx');
    }
    public function export45() 
    {
        return Excel::download(new Kategori45Export, 'HasilGowes45.xlsx');
    }
    public function export28() 
    {
        return Excel::download(new Kategori45Export, 'HasilGowes28.xlsx');
    }
    public function export75() 
    {
        return Excel::download(new Kategori75Export, 'HasilGowes75.xlsx');
    }

    public function export76() 
    {
        return Excel::download(new Kategori76Export, 'HasilGowes76.xlsx');
    }

    public function edit($id){
        $hasil = Hasilgowes::where('id',$id)->first();
        return $hasil;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'status'               => 'required'
        ]);

        DB::beginTransaction();
        try{
            Hasilgowes::updateOrCreate(['id' => $request->id],
                [
                'status'   => $request->status
                ]);
            DB::commit();
            return response()->json(['sukses'=>'Data Berhasil Diupdate']);
        }catch (\Exception $e){
            DB::rollback();
            return redirect::back()->with('gagal','Data Gagal Diupdate');
        }
    }
}
