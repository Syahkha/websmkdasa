<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
  
    public function artikel(){
        return $this->hasMany('App\Model\artikel','foreign_key','idkategori');
    }

}
