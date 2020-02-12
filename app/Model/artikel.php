<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = "artikel";

    public function kat(){
        return $this->belongsTo('App\Model\Kategori',);
    }
    public function user(){
        return $this->belongsTo('App\Model\user');
    }
}
