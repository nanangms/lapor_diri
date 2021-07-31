<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lapor_diri;

class DashboardController extends Controller
{
    public function index(){
    	$jml_data = Lapor_diri::all()->count();
        return view('dashboard.index',compact('jml_data'));
        
    }
}
