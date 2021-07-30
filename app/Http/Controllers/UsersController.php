<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use File;
use DataTables;
use DB;

class UsersController extends Controller
{
    public function index()
    {
        $user = \App\User::all();
        return view('user.index',['user' => $user]);
    }

    public function tambah_user(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'username'=>'required|min:5|unique:users',
            'password'=>'required|min:6',
            'role'=>'required',
            'aktif'=>'required',
            'photo'=> 'mimes:jpg,png,jpeg'
        ]);

        $model = User::create($request->all());
        return $model;
    }

    public function tambah(Request $request){
        
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'username'=>'required|min:5|unique:users',
            'password'=>'required|min:6',
            'role'=>'required',
            'aktif'=>'required',
            'photo'=> 'mimes:jpg,png,jpeg'
        ]);

        //insert ke tabel user
        $user = new \App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->aktif = $request->aktif;
        //$user->remember_token = str_random('60');
        if ($request->hasFile('photo')) {
                $request->file('photo')->move('images/',$request->file('photo')->getClientOriginalName());
                $user->photo = $request->file('photo')->getClientOriginalName();
            }
        $user->save();

        //insert ke tabel siswa
        // $request->request->add(['user_id'=>$user->id]);
        // $siswa = \App\Siswa::create($request->all());
        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        //     $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        //     $siswa->save();
        // }
        return redirect('/user')->with('sukses','Data berhasil diinput');
        
    }

    public function delete(User $user){
        $user->delete();
        if($user->photo != ""){
            File::delete('images/'.$user->photo);
        }
        return redirect('/user')->with('hapus','Data Berhasil dihapus');
    }

    public function edit(User $user){
        return view('user.edit_admin',['user' => $user]);
    }

    public function profil($id){
        $d = decrypt($id);
        $user = User::where('id',$d)->first();
        return view('user.profil',['user' => $user]);
    }

    // public function profil(User $user){
    //     if($user->id != auth()->user()->id){
    //         return view('auth.akses_terbatas');
    //     }
    //     return view('user.edit',['user' => $user]);
    // }

    public function update(Request $request,User $user){
        
        $user->update($request->all());
        if ($request->hasFile('photo')) {
            if($user->photo != ""){
                File::delete('images/'.$user->photo);
            }
            $request->file('photo')->move('images/',$request->file('photo')->getClientOriginalName());
            $user->photo = $request->file('photo')->getClientOriginalName();
            $user->update();
        }
        if(auth()->user()->role == 'admin'){
            return redirect('/user')->with('sukses','Data Berhasil diupdate');
        }else{
            return redirect('/profil/'.auth()->user()->id)->with('sukses','Data Berhasil diupdate');
        }
    }

    public function ganti_password(Request $request,$id){
        $d = decrypt($id);
        $user = User::findOrFail($d);
    
        $this->validate($request,[
            'password' => 'required',
            'password_baru' => 'required|min:6|required_with:password|same:password',
        ]);

        $user->password = bcrypt($request->get('password_baru'));
        $user->update();
        
        return redirect('/user')->with('sukses','Password Berhasil dirubah');
    }

    public function dataTable()
    {
        $user = User::select('users.*');
        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                return '<button data-toggle="modal" data-target-id="'.$user->id.'" data-target="#ShowEDIT" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-sm hapus" user-name="'.$user->name.'" user-id="'.$user->id.'"><i class="fa fa-trash"></i> Hapus</button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function update_profil(Request $request,$id){
        $d = decrypt($id);
        $user = User::findOrFail($d);

        if ($request->hasFile('photo')) {
            $foto = $request->file('photo');
            $image_name1 = $request->name.'_'.time().'.'.$foto->getClientOriginalExtension();
            DB::beginTransaction();
            try{
                if($user->photo != ""){
                    File::delete('images/'.$user->photo);
                }
                $image_resize = Image::make($foto->getRealPath());
                $image_resize->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
                $image_resize->save(public_path('images/'.$image_name1));

                $user->name        = $request->name;
                $user->email       = $request->email;
                $user->username    = $request->username;
                $user->photo       = $image_name1;
                $user->save();

                DB::commit();
                return redirect('/profil/'.encrypt(auth()->user()->id))->with('sukses','Data Berhasil diupdate');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }else{
            DB::beginTransaction();
            try{
                $user->name        = $request->name;
                $user->email       = $request->email;
                $user->username    = $request->username;
                $user->save();
                DB::commit();
                return redirect('/profil/'.encrypt(auth()->user()->id))->with('sukses','Data Berhasil diupdate');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }


    }

    public function ganti_password_profil(Request $request,$id){
        $d = decrypt($id);
        $user = User::findOrFail($d);
    
        $this->validate($request,[
            'password' => 'required',
            'password_baru' => 'required|min:6|required_with:password|same:password',
        ]);

        $user->password = bcrypt($request->get('password_baru'));
        $user->update();
        
        return redirect('/profil/'.encrypt(auth()->user()->id))->with('sukses','Password Berhasil dirubah');
    }
}
