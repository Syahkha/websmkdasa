<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $table="orang_tua";
    public function siswa()
    {
    	return $this->belongsToMany('App\siswa');
    }
}
