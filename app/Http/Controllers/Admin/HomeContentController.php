<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutServiceContent;
use App\Models\PageImage;
use App\Models\HomeContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class HomeContentController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home Page Content';
        $home = HomeContent::first();
        $client_images = PageImage::where('type', 'client')->get();
        return view('admin.home_content.index', compact('data', 'home', 'client_images'));
    }

    public function update(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif,mp4,mov,avi,wmv|max:20480',
            'about_title' => 'required_if:about,1',
            'about_btn_text' => 'required_if:about,1',
            'about_description' => 'required_if:about,1',
            'client_title' => 'required_if:client,1',
            'contact_title' => 'required_if:contact,1',
            'contact_subtitle' => 'required_if:contact,1',
            'contact_description' => 'required_if:contact,1',
            'contact_btn_text' => 'required_if:contact,1',
            'contact_address_title' => 'required_if:contact,1',
        ],[
            'about_title.required_if' => 'The about title field is required.',
            'about_btn_text.required_if' => 'The about button text field is required.',
            'about_description.required_if' => 'The about description field is required.',
            'client_title.required_if' => 'The client title field is required.',
            'contact_title.required_if' => 'The contact title field is required.',
            'contact_subtitle.required_if' => 'The contact subtitle field is required.',
            'contact_description.required_if' => 'The contact description field is required.',
            'contact_btn_text.required_if' => 'The contact button text field is required.',
            'contact_address_title.required_if' => 'The contact address title field is required.',
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
                $uploadImage = uploadGeneralFile($banner_file, $file_path);
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
                        $uploadImage = uploadGeneralFile($client_image, $file_path);
                        // Save the path to the file in the database
                        $client = new PageImage();
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
                $uploadImage = uploadGeneralFile($footer_image, $file_path);
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
        $client_image = PageImage::find($id);
        if ($client_image) {
            if (File::exists(public_path($client_image->image))) {
                File::delete(public_path($client_image->image));
            }
            $client_image->delete();
            Toastr::success('Image deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
        }else{
            Toastr::error('Image not found', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function about()
    {
        $data['title'] = 'About Page Content';
        $data['about'] = AboutServiceContent::where('page_type', 'about')->first();
        $data['team_images'] = PageImage::where('type', 'team')->get();
        return view('admin.home_content.about', $data);
    }

    public function aboutUpdate(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif,mp4,mov,avi,wmv|max:20480',
            'mission_title' => 'required_if:mission_section,1',
            'mission_description' => 'required_if:mission_section,1',
            'vision_title' => 'required_if:vision_section,1',
            'vision_description' => 'required_if:vision_section,1',
            'team_title' => 'required_if:team_section,1',
        ],[
            'mission_title.required_if' => 'The mission title field is required.',
            'mission_description.required_if' => 'The mission description field is required.',
            'vision_title.required_if' => 'The vision title field is required.',
            'vision_description.required_if' => 'The vision description field is required.',
            'team_title.required_if' => 'The team title field is required.',
        ]);

        $about = AboutServiceContent::where('page_type', 'about')->first();
        if (empty($about)) {
            $about = new AboutServiceContent();
            $about->page_type = 'about';
        }
        $about->title = $request->title ?? 'About Title';
        $about->mission_section = $request->mission_section ? 1 : 0;
        $about->mission_title = $request->mission_title;
        $about->mission_description = $request->mission_description;
        $about->vision_section = $request->vision_section ? 1 : 0;
        $about->vision_title = $request->vision_title;
        $about->vision_description = $request->vision_description;
        $about->team_section = $request->team_section ? 1 : 0;
        $about->team_title = $request->team_title;

        // upload image
        $image = $request->file('image');
        if ($image) {
            $file_path = 'assets/uploads/about';
            // Upload the file
            $uploadImage = uploadGeneralFile($image, $file_path);
            // Save the path to the file in the database
            $about->image = $uploadImage['path'] ?? '';
            $about->file_type = $uploadImage['type'] ?? '';
        }
        // upload team_images form array of file
        $team_images = $request->file('team_images');
        if (!empty($team_images)) {
            foreach ($team_images as $team_image) {
                if ($team_image) {
                    $file_path = 'assets/uploads/team_images';
                    // Upload the file
                    $uploadImage = uploadGeneralFile($team_image, $file_path);
                    // Save the path to the file in the database
                    $team = new PageImage();
                    $team->image = $uploadImage['path'] ?? '';
                    $team->type = 'team';
                    $team->save();
                }
            }
        }
        $about->save();
        Toastr::success('About page content successfully update', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }



}
