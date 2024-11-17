<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientImage;
use App\Models\HomeContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class HomeContentController extends Controller
{
    public function index()
    {
        $data['title'] = __('messages.common.home_page_content');
        $home = HomeContent::first();
        $client_images = ClientImage::all();
        return view('admin.home_content.index', compact('data', 'home', 'client_images'));
    }

    public function update(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'about_title' => 'required',
            'about_btn_text' => 'required',
            'about_description' => 'required',
            'client_title' => 'required',
            'contact_title' => 'required',
            'contact_subtitle' => 'required',
            'contact_description' => 'required',
            'contact_btn_text' => 'required',
            'contact_address_title' => 'required',
//            'footer_title' => 'required',

        ]);


        try {
            $home = HomeContent::first();
            if (empty($home)) {
                $home = new HomeContent();
            }
            $home->banner_section       = $request->banner ? 1 : 0;
            $home->about_section        = $request->about ? 1 : 0;
            $home->client_section       = $request->client ? 1 : 0;
            $home->contact_section      = $request->contact ? 1 : 0;
            $home->about_title          = $request->about_title;
            $home->about_btn_text       = $request->about_btn_text;
            $home->about_description    = $request->about_description;
            $home->client_title         = $request->client_title;
            $home->contact_title        = $request->contact_title;
            $home->contact_subtitle     = $request->contact_subtitle;
            $home->contact_description  = $request->contact_description;
            $home->contact_btn_text     = $request->contact_btn_text;
            $home->contact_address_title = $request->contact_address_title;
//            $home->footer_text = $request->footer_title;

            $banner_file = $request->file('image');
            if (!empty($banner_file)) {
                $file_path = '/assets/uploads/banner';
                // Upload the file
                $uploadImage = uploadGeneralFile($banner_file, $home, $file_path);
                // Save the path to the file in the database
                $home->image = $uploadImage['path'] ?? '';
                $home->file_type = $uploadImage['type'] ?? '';
            }
            // upload client_images form array of file
            $client_images = $request->file('client_images');
            if (!empty($client_images)) {
                foreach ($client_images as $client_image) {
                    if ($client_image) {
                        $file_path = 'assets/uploads/client_images';
                        // Upload the file
                        $uploadImage = uploadGeneralFile($client_image, $home, $file_path);
                        // Save the path to the file in the database
                        $client = new ClientImage();
                        $client->image = $uploadImage['path'] ?? '';
                        $client->save();
                    }
                }
            }

            // upload footer_image
            $footer_image = $request->file('footer_image');
            if (!empty($footer_image)) {
                $file_path = 'assets/uploads/footer_image';
                // Upload the file
                $uploadImage = uploadGeneralFile($footer_image, $home, $file_path);
                // Save the path to the file in the database
                $home->footer_image = $uploadImage['path'] ?? '';
            }
            $home->save();

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', __('messages.toastr.home_content_error'));
        }
        Toastr::success(__('messages.toastr.home_content_success'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function deleteClientImage($id)
    {
        $client_image = ClientImage::find($id);
        if ($client_image) {
            if (File::exists(public_path($client_image->image))) {
                File::delete(public_path($client_image->image));
            }
            $client_image->delete();
            Toastr::success('Client image deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
        }
        Toastr::error('Client image not found', 'Error', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
