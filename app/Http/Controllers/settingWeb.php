<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingWeb extends Controller
{
    public function setweb(){
        return view('user.setting_web');
    }
}
