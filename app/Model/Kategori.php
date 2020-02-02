<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public function sub_kategori(){
        return $this->hasMany('App\Model\SubKategori');
    }
}
