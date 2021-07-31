<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapor_diri extends Model
{
    protected $table = 'lapor_diri';
    protected $guard = [];

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
