<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    public function Ortu()
    {
    	return $this->belongsToMany('App\Ortu','forgein_key','idortu');
    }
}
