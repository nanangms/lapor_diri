<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = ['kecamatan_id','nama_kelurahan'];
    
    public function koperasi(){
        return $this->hasMany(Koperasi::class);
    }

    public function permohonan(){
        return $this->hasMany(Permohonan::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
