<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingWebController extends Controller
{
    public function setweb(){
        return view('user.setting_web');
    }
}
