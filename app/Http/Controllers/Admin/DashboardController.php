<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Card;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        $data['title'] = __('messages.common.dashboard');
        $data['users'] = User::get();
        $data['cards'] = Card::count();

        $data['userCards'] = Card::with(['user' => function ($query) {
            return $query->where('status', 1);
        }])->withCount('analytics')->orderBy('id', 'desc')->take(20)->get();

        $data['plan'] = Plan::count();
        $data['totalTransaction'] = Transaction::where('status', 1)->sum('amount');
        return view('admin.dashboard',compact('data'));
    }


    public function cacheClear(){
        // \Artisan::call('php artisan cache:forget spatie.permission.cache');
        Artisan::call('route:clear');
        Artisan::call('optimize');
        Artisan::call('optimize:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('storage:link');
        Artisan::call('cache:forget spatie.permission.cache');
        Artisan::call('config:cache');

        echo 'Done';
        die();
    }

    public function adminProfile()
    {
        $roles = Role::latest()->get();
         return view('admin.profile.index', compact('roles'));
    }
    public function profileEdit()
    {
         return view('admin.profile.edit');
    }

    public function profileUpdate(Request $request)
    {


        $user_id = Auth::user()->id;
        $user = Admin::where('id', $user_id)->first();
        $this->validate($request, [
            'name'  => 'required',
            'email'   => 'required|unique:admins,email,' . $user->id . ',id',
        ]);

        try {

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->hasFile('image')) {

                // Delete the existing image file if it exists
                if (File::exists(public_path($user->image))) {
                    File::delete(public_path($user->image));
                }

                // Upload and save the new image
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'uploads/admin';
                $image->move(public_path($file_path), $image_name);
                $user->image  = $file_path . '/' . $image_name;

            }

            $user->save();
        } catch (\Exception $e) {
            Toastr::error(trans('An unexpected error occured while updating profile information'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        Toastr::success(trans('Profile information updated successfully'), trans('Success'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.profile');
    }
    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [

            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ]);

        try {
            $user  = Admin::find(Auth::user()->id);
            $user->password = Hash::make($request->input('password'));
            $user->update();

        } catch (\Exception $e) {
            Toastr::error(trans('An unexpected error occured while updating password'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        Toastr::success(trans('Password updated successfully'), trans('Success'), ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
