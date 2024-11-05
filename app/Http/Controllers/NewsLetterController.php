<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function index(){
        $emails = [];
        return view('admin.newsletter.email_list', compact('emails'));
    }
}
