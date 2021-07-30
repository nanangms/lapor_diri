<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pemenang;
use \App\Pendaftaran;
use App\Kategori_pemenang;
use DB;
use DataTables;

class PemenangController extends Controller
{
    public function index(){
    	$kategori = \App\Kategori_pemenang::get();
        return view('pemenang.index',compact('kategori'));
    }

    public function pemenang_kategori($id){
    	$kategori = \App\Kategori_pemenang::where('id',$id)->first();
    	$id = $id;
        return view('pemenang.pemenang_kategori',compact('kategori','id'));
    }

    public function tambah_pemenang(Request $request)
    {
        $this->validate($request, [
            'no_peserta'=>'required'
        ]);
        
        	DB::beginTransaction();
            try{
            	$pemenang = new \App\Pemenang;
                $pemenang->no_peserta        	= $request->no_peserta;
                $pemenang->kategori_pemenang_id = $request->kategori_pemenang_id;
                $pemenang->save();

                DB::commit();
                return response()->json(['success'=>'Data berhasil disimpan!']);
            }catch (\Exception $e){
                DB::rollback();
                return response()->json(['error'=>'Data gagal disimpan!']);
            }
        
        
    }

    public function edit_pemenang(Request $request)
    {
        $this->validate($request, [
            'no_peserta'=>'required'
        ]);
        
        	DB::beginTransaction();
            try{
            	$pemenang = Pemenang::where('id',$request->id)->first();
                $pemenang->no_peserta        	= $request->no_peserta;
                $pemenang->kategori_pemenang_id = $request->kategori_pemenang_id;
                $pemenang->save();

                DB::commit();
                return response()->json(['success'=>'Data berhasil dirubah!']);
            }catch (\Exception $e){
                DB::rollback();
                return response()->json(['error'=>'Data gagal dirubah!']);
            }
    }

    public function table_pemenang($id)
    {
        //$pemenang = Pemenang::with('pendaftaran')->where('kategori_pemenang_id',$id)->get();
        $pemenang = DB::table('pemenang as a')
        ->select('a.*','b.nama','a.id as id_hasil','b.id as id_daftar')
        ->leftjoin('pendaftaran as b','a.no_peserta','b.no_pendaftaran')
        ->where('kategori_pemenang_id',$id)
        ->latest();
        //->orderBy('id','DESC')->get();

        return DataTables::of($pemenang)
            ->addColumn('action', function ($pemenang) {
            	

                return '<button data-toggle="modal" data-target-id="'.$pemenang->id_daftar.'" data-target="#ShowEDIT" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</button> <button data-toggle="modal" data-target="#modal-update" title="edit" data-id="'.$pemenang->id.'" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</button>

                    <button class="btn btn-danger btn-sm hapus" user-name="'.$pemenang->nama.'" user-id="'.$pemenang->id.'"><i class="fa fa-trash"></i> Hapus</button>';
            })
            ->addColumn('nama_peserta', function ($pemenang) {
                return $pemenang->nama;
            })
            ->addIndexColumn()
            ->rawColumns(['action','nama_peserta'])
            ->make(true);
    }

    public function delete($id){
    	$pemenang = Pemenang::where('id',$id)->first();
        $pemenang->delete();

        return response()->json(['success'=>'Data berhasil disimpan!']);
    }

    function get_record($id){
        $data = Pemenang::where('id', $id)->first();
        return response()->json($data);
    }
}
