<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $guarded = ['nama_provinsi'];
    
    public function koperasi(){
        return $this->hasMany(Koperasi::class);
    }
}
