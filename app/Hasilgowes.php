<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasilgowes extends Model
{
    protected $table = 'hasil';
    protected $fillable = ['no_pendaftaran','tgl_gowes','jarak_tempuh','hasil_gowes','photo_gowes','status'];

    public function pendaftaran(){
        return $this->belongsTo(Pendaftaran::class,'no_pendaftaran');
    }
}
