<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $guarded = ['nama_kabupaten'];
    
    public function koperasi(){
        return $this->hasMany(Koperasi::class);
    }
}
