<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemenang extends Model
{
    protected $table = 'pemenang';
    protected $fillable = ['no_peserta','kategori_pemenang_id'];

    public function pendaftaran(){
        return $this->belongsTo(Pendaftaran::class,'no_peserta');
    }
}
