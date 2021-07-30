<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = ['nama_kecamatan'];
    
    public function koperasi(){
        return $this->hasMany(Koperasi::class);
    }

    public function permohonan(){
        return $this->hasMany(Permohonan::class);
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
