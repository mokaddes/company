<?php

namespace App\Actions\User;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CreateUser
{
    public static function create(object $request)
    {
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('image')) {

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
        $user->password = bcrypt($request->password);
        $user->status   = $request->status;
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return true;
    }
}
