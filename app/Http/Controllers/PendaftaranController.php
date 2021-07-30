<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use \App\Pendaftaran;
use DataTables;
use App\Exports\LaporanExport;
use Jenssegers\Date\Date;
use PDF;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.index');
    }
    //data pendaftaran
    public function dataTable()
    {
        $pendaftaran = Pendaftaran::select('pendaftaran.*')->orderby('id','DESC');
        return DataTables::of($pendaftaran)
            ->addColumn('action', function ($pendaftaran) {
                $delete = '<button class="btn btn-danger btn-sm hapus" pendaftaran-name="'.$pendaftaran->nama.'" pendaftaran-id="'.$pendaftaran->id.'"><i class="fa fa-trash"></i> Hapus</button>';
            	if(auth()->user()->role == 'superadmin'){
            		return '<button data-toggle="modal" data-target-id="'.$pendaftaran->id.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button>
                    <a href="/pendaftaran/'.$pendaftaran->id.'/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
            		 <a href="/simpan-no-pendaftaran/'.encrypt($pendaftaran->id).'" class="btn btn-default btn-sm"><i class="fa fa-print"></i> cetak no.peserta</a> ';
            	}else{
            		return '<button data-toggle="modal" data-target-id="'.$pendaftaran->id.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button> 
                        <a href="/pendaftaran/'.$pendaftaran->id.'/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="/simpan-no-pendaftaran/'.encrypt($pendaftaran->id).'" class="btn btn-default btn-sm"><i class="fa fa-print"></i> cetak no.peserta</a>
                    
                    ';
            	}
                    
            })
            ->addColumn('tanggal', function ($pendaftaran) {
                return tgl_indo(substr($pendaftaran->tgl_lahir ,0,10)).' / '.umur($pendaftaran->tgl_lahir);
            })
            ->addIndexColumn()
            ->rawColumns(['action','tanggal'])
            ->make(true);
    }

    public function detail(Pendaftaran $pendaftaran){
        return view('pendaftaran.detail',['pendaftaran' => $pendaftaran]);
    }

    public function cek_daftar($nik){
        $pendaftaran = Pendaftaran::where('nik',$nik)->firstorfail();
        return $pendaftaran;
    }

    public function delete(Pendaftaran $pendaftaran){
        $pendaftaran->delete();
        return redirect('/pendaftaran')->with('hapus','Data Berhasil dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }

    public function edit(Pendaftaran $pendaftaran){
        
        return view('pendaftaran.edit',compact(['pendaftaran']));
    }

    public function update(Request $request,Pendaftaran $pendaftaran){
        // $this->validate($request,[
        //     //identitas pendaftaran
        //     'no_pendaftaran'=>'required',
        //     'nama'=>'required',
        //     'nik'=>'required|min:16',
        //     'email'=>'required|unique:pendaftaran',
        //     'tgl_lahir' => 'required', 
        //     'jenis_kelamin' => 'required', 
        //     'alamat_lengkap'=>'required',
        //     'kota'=>'required',
        //     'no_hp'=>'required',
        //     'kategori'=>'required',
        //     'app_digunakan'=>'required',
        //     'app_digunakan'=>'required',
        //     'kategori_sepeda'=>'required',
        //     'jenis_sepeda'=>'required',
        //     'strava'=>'required'
        // ]);

        $pendaftaran->update($request->all());
        return redirect('/pendaftaran')->with('sukses','Data Berhasil diupdate');
        
    }

    public function data_kategori($kategori){
        $kategori_jarak = $kategori;
        return view('pendaftaran.kategori',['kategori_jarak' => $kategori_jarak]);
    }

    public function pendaftaran_kategori($kategori)
    {
        $pendaftaran = Pendaftaran::select('pendaftaran.*')->where('kategori',$kategori)->orderBy('id','ASC');

        return DataTables::of($pendaftaran)
            ->addColumn('action', function ($pendaftaran) {
                if(auth()->user()->role == 'superadmin'){
                    $delete = '<button class="btn btn-danger btn-sm hapus" pendaftaran-name="'.$pendaftaran->nama.'" pendaftaran-id="'.$pendaftaran->id.'"><i class="fa fa-trash"></i> Hapus</button>';
                    return '<button data-toggle="modal" data-target-id="'.$pendaftaran->id.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button>
                    <a href="/pendaftaran/'.$pendaftaran->id.'/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <a href="/simpan-no-pendaftaran/'.encrypt($pendaftaran->id).'" class="btn btn-default btn-sm"><i class="fa fa-print"></i> cetak no.peserta</a> ';
                }else{
                    return '<button data-toggle="modal" data-target-id="'.$pendaftaran->id.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button> 
                    <a href="/pendaftaran/'.$pendaftaran->id.'/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <a href="/simpan-no-pendaftaran/'.encrypt($pendaftaran->id).'" class="btn btn-default btn-sm"><i class="fa fa-print"></i> cetak no.peserta</a>';
                }
                    
            })
            ->addColumn('tanggal', function ($pendaftaran) {
                return tgl_indo(substr($pendaftaran->tgl_lahir ,0,10)).' / '.umur($pendaftaran->tgl_lahir);
            })
            ->addIndexColumn()
            ->rawColumns(['action','tanggal'])
            ->make(true);
    }

    public function cetak_pendaftaran_kategori($kategori) 
    {   Date::setLocale('id');
        $kateg = $kategori;
        $pendaftaran = Pendaftaran::where('kategori',$kateg)->orderby('id','ASC')->get();
        //$pendaftaran = DB::table('hasil as a')->select('a.*','b.*','a.id as id_hasil')->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')->where('b.kategori',$kategori)->orderby('id_hasil','ASC')->get();

        $pdf = PDF::loadView('pendaftaran.laporan_kategori',['pendaftaran' => $pendaftaran,'kateg' => $kateg])->setPaper('legal','landscape');

        return $pdf->stream('cetak_pendaftaran_kategori_'.$kategori.'.pdf');
    }
}
