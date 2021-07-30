<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formstatus extends Model
{
    protected $table = 'formstatus';
    protected $fillable = ['nama_form','status'];
}
