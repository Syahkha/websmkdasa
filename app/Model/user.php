<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public function artikel(){
        return $this->hasMany('App\Model\artikel');
    }
}
