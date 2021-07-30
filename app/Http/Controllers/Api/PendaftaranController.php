<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pendaftaran;

class PendaftaranController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Posts"
            ],
            "data" => $posts
        ], 200);
    }
   
    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function list($kategori)
    {
        $data = Pendaftaran::where('kategori', $kategori)->get();

        if($data) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Data Kategori: ".$kategori
                ],
                "data" => $data
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Tidak Ada Data!"
                ],
                "data" => null
            ], 404);

        }
    }

    
    /**
     * PostHomePage
     *
     * @return void
     */
    public function PostHomePage()
    {
        $posts = Post::latest()->take(6)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Posts Homepage"
            ],
            "data" => $posts
        ], 200);
    }
}
