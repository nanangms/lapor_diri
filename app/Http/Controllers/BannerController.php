<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Banner;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class BannerController extends Controller
{
    public function index()
    {
        $banner = \App\Banner::all();
        return view('banner.index',['banner' => $banner]);
    }

    public function tambah(Request $request){
        
        $this->validate($request,[
            'nama_banner'=>'required',
            'status_aktif'=>'required',
            'photo'=> 'mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $image_name1 = str_replace(' ', '_', $request->nama_banner).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/slide/'.$image_name1));

            DB::beginTransaction();
            try{
                $banner = new \App\Banner;
                $banner->nama_banner   = $request->nama_banner;
                $banner->status_aktif  = $request->status_aktif;
                $banner->gambar        = $image_name1;
                $banner->save();
                
                DB::commit();
                return redirect()->back()->with('sukses','Banner berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
        
    }

    public function delete(Banner $banner){
        $banner->delete();
        if($banner->gambar != ""){
            File::delete('images/slide/'.$banner->gambar);
        }
        return redirect('/banner')->with('hapus','Data Berhasil dihapus');
    }

    public function edit(Banner $banner){
    	//dd($banner);
        return view('banner.edit',['banner' => $banner]);

    }

    public function update(Request $request,Banner $banner){
        
        $banner->update($request->all());

        if ($request->hasFile('gambar')) {
            if($banner->gambar != ""){
                File::delete('images/slide/'.$banner->gambar);
            }

            $foto = $request->file('gambar');
            $image_name1 = str_replace(' ', '_', $request->nama_banner).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/slide/'.$image_name1));

            DB::beginTransaction();
            try{
                $banner->nama_banner   = $request->nama_banner;
                $banner->status_aktif  = $request->status_aktif;
                $banner->gambar        = $image_name1;
                $banner->save();
                
                DB::commit();
                return redirect('/banner')->with('sukses','Data Berhasil diupdate');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }

        return redirect('/banner')->with('sukses','Data Berhasil diupdate');
        
    }
}
