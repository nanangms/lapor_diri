<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use \App\Lapor_diri;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LapordiriController extends Controller
{
    public function index()
    {
        return view('lapor_diri.index');
    }

    public function dataTable()
    {
        $lapor_diri = Lapor_diri::with(['kecamatan','kelurahan'])->orderby('id','DESC')->get();
        return DataTables::of($lapor_diri)
            ->addColumn('action', function ($lapor_diri) {
                $delete = '<button class="btn btn-danger btn-xs hapus" lapor_diri-name="'.$lapor_diri->nama.'" lapor_diri-id="'.$lapor_diri->id.'"><i class="fa fa-trash"></i> Hapus</button>';
            	if(auth()->user()->role == 'superadmin'){
            		return '<button data-toggle="modal" data-target-id="'.$lapor_diri->id.'" data-target="#ShowEDIT" class="btn btn-primary btn-xs" title="Detail"><i class="fa fa-eye"></i></button>
                    
                    <button class="btn btn-danger btn-xs hapus" lapor_diri-name="'.$lapor_diri->nama.'" lapor_diri-id="'.$lapor_diri->id.'"><i class="fa fa-trash"></i></button>
            		 ';
            	}else{
            		return '<button data-toggle="modal" data-target-id="'.$lapor_diri->id.'" data-target="#ShowEDIT" class="btn btn-primary btn-xs" title="Detail"><i class="fa fa-eye"></i> Detail</button> 
                        <a href="/lapor_diri/'.$lapor_diri->id.'/edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>';
            	}
                    
            })
            ->addColumn('foto_bukti', function ($lapor_diri) {
                return "<a href=".asset('images/foto_test/'.$lapor_diri->foto_test)." target='_blank'><img src=".asset('images/foto_test/'.$lapor_diri->foto_test)." width='100px'></a>";
            })
            ->addColumn('tanggal_test', function ($pendaftaran) {
                return tgl_indo($pendaftaran->tgl_test);
            })
            ->addIndexColumn()
            ->rawColumns(['action','foto_bukti','tanggal_test'])
            ->make(true);
    }

    public function detail($id){
    	$lapor_diri = Lapor_diri::with(['kecamatan','kelurahan'])->where('id',$id)->first();
        return view('lapor_diri.detail',['lapor_diri' => $lapor_diri]);
    }

    public function delete($id){
    	$lapor_diri = Lapor_diri::where('id',$id)->first();
        $lapor_diri->delete();
        return redirect('/data-lapor-diri')->with('hapus','Data Berhasil dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new LaporanExport, 'laporan-data-lapor-diri.xlsx');
    }
}
