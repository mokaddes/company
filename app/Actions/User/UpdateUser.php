<?php

namespace App\Actions\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UpdateUser
{
    public static function update(object $request, object $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status   = $request->status;
        
        if ($request->hasFile('image')) {

            // Delete the existing image file if it exists
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

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

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        if ($request->roles) {
            $user->roles()->detach();
            $user->assignRole($request->roles);
        }

        return true;

        // if ($request->has('image')) {
        //     $image = $request->image;
        //     $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     Storage::putFileAs('public/user', $image, $fileName);
        //     $db_image = 'storage/user/' . $fileName;
        //     $user->image = $db_image;
        // }

    }
}
