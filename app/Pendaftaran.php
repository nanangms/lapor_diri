<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = ['no_pendaftaran','nama','nik','email','tgl_lahir','jenis_kelamin','alamat_lengkap','kota','no_hp','kategori','instagram','facebook','app_digunakan','strava','kategori_sepeda',
'jenis_sepeda',
'komunitas_sepeda'];

    public function hasilgowes() { 
      	return $this->hasOne(Pendaftaran::class,'no_pendaftaran'); 
	}

	public function pemenang() { 
      	return $this->hasOne(Pendaftaran::class,'no_pendaftaran'); 
	}
}
