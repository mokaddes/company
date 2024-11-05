<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SettingsController extends Controller
{


    public function setview(){
        $setting = Setting::first();
        return view('admin.settings.mobileApp.index', compact("setting"));
    }


    public function MobileAppUpdate(Request $request){

        $setting = Setting::first();
        $setting->android_app_url  = $request->android_download_url;
        $setting->ios_app_url      = $request->ios_download_url;
        $setting->update();
        Toastr::success(trans('Successfully Updated'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }


}
