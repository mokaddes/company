<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Inquiry;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        $title = __('messages.common.contacts');
        $vcardIds = Card::where('user_id', auth()->user()->id)->pluck('id')->toArray();
        $inquiries = Inquiry::with('vcard')->whereIn('vcard_id', $vcardIds)->get();
        return view('user.contact.index', compact('title','inquiries'));
    }

    public function view($id)
    {

        $data['row']= Inquiry::find($id);
        $html = view('user.contact.view', compact('data'))->render();
        return response()->json($html);
    }
}
