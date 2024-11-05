<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function genview(){
        return view('admin.settings.General.general');
    }
}
