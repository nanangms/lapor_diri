<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pendaftaran;

class ApiController extends Controller
{
    
    public function list($kategori)
    {
        $data = Pendaftaran::select('pendaftaran.no_pendaftaran','pendaftaran.nama')->where('kategori', $kategori)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Kategori: ".$kategori
            ],
            "data" => $data
        ], 200);

        
    }

    
}
