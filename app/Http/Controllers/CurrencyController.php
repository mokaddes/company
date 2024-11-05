<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function currenview(){
        return view('admin.settings.currency.index');
    }
}
