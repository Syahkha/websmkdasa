<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table = 'sub_kategori';
    public function kategori(){
        return $this->belongsTo('App\Model\Kategori');
    }
}
