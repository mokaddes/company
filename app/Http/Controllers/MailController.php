<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class MailController extends Controller
{
    public function mailview(){
        return view('admin.settings.testmail');
    }
    public function testMail(Request $request){
        $this->validate($request, [
            'test_email'  => 'required',
        ]);
        $message = [
            'msg' => 'Test mail'
        ];
        $mail = false;

        try {
            Mail::to($request->test_email)->send(new \App\Mail\TestMail($message));
            $mail = true;
        } catch (\Exception $e) {
            dd($e);
            Toastr::success(trans('Email configuration wrong.'), 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        if ($mail == true) {

            Toastr::success(trans('Test mail send successfully.'), 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
