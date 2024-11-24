<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Setting
    public function general()
    {
        $data['title'] = 'Settings';
        $data['settings'] = Setting::first();

        return view('admin.settings', $data);
    }

    // Update Setting
    public function generalStore(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();
        try {
            $setting = Setting::find(1);
            $setting->google_key = $request->google_key;
            $setting->google_analytics_id = $request->google_analytics_id;
            $setting->site_name = $request->site_name;
            $setting->seo_meta_description = $request->seo_meta_desc;
            $setting->seo_keywords = $request->meta_keywords;
            $setting->tawk_chat_bot_key = $request->tawk_chat_bot_key;
            $setting->app_mode = $request->app_mode;
            $setting->copyright_text = $request->copyright_text;

            $setting->email = $request->email;
            $setting->support_email = $request->email;
            $setting->phone_no = $request->phone_no;
            $setting->office_address = $request->office_address;
            $setting->address = $request->office_address;
            $setting->contact_title = $request->contact_title;
            $setting->contact_subtitle = $request->contact_subtitle;
            $setting->contact_form_title = $request->contact_form_title;
            $setting->service_title = $request->service_title;
            $setting->service_description = $request->service_description;

            $favicon = $request->file('favicon');
            if (!empty($favicon)) {
                $uploadImage = uploadGeneralFile($favicon, 'favicon', $setting->favicon);
                $setting->favicon = $uploadImage['path'] ?? '';
            }
            $site_logo = $request->file('site_logo');
            if (!empty($site_logo)) {
                $uploadImage = uploadGeneralFile($site_logo, 'site_logo', $setting->site_logo);
                $setting->site_logo = $uploadImage['path'] ?? '';
            }
            $seo_image = $request->file('seo_image');
            if (!empty($seo_image)) {
                $uploadImage = uploadGeneralFile($seo_image, 'seo_image', $setting->seo_image);
                $setting->seo_image = $uploadImage['path'] ?? '';
            }

            $footer_image = $request->file('footer_image');
            if (!empty($footer_image)) {
                $uploadImage = uploadGeneralFile($footer_image, 'footer_image', $setting->footer_image);
                $setting->footer_image = $uploadImage['path'] ?? '';
            }

            $contact_image = $request->file('contact_image');
            if (!empty($contact_image)) {
                $uploadImage = uploadGeneralFile($contact_image, 'contact_image', $setting->contact_image);
                $setting->contact_image = $uploadImage['path'] ?? '';
            }

            $service_image = $request->file('service_image');
            if (!empty($service_image)) {
                $uploadImage = uploadGeneralFile($service_image, 'service_image', $setting->service_image);
                $setting->service_image = $uploadImage['path'] ?? '';
            }


            $setting->update();


            $app_name = str_replace('"', '', $request->site_name);
            $app_name = str_replace(' ', '', $app_name);

            $app_mode = $request->app_mode == 'live' ? 'production' : 'local';
            $this->changeEnv([
                'APP_NAME' => '"' . $app_name . '"',
                'APP_ENV' => $app_mode,
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Setting update failed', 'Failed', ["positionClass" => "toast-top-right"]);
        }

        DB::commit();
        Toastr::success('Setting updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);

            // Loop through given data
            foreach ((array)$data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

    public function taxSetting()
    {
        $config = DB::table('config')->get();
        $settings = Setting::first();

        return view('admin.tax.index', compact('config', 'settings'));
    }

    public function updateTaxSetting(Request $request)
    {

        DB::table('config')->where('config_key', 'invoice_prefix')->update([
            'config_value' => $request->invoice_prefix,
        ]);

        DB::table('config')->where('config_key', 'invoice_name')->update([
            'config_value' => $request->invoice_name,
        ]);

        DB::table('config')->where('config_key', 'invoice_email')->update([
            'config_value' => $request->invoice_email,
        ]);

        DB::table('config')->where('config_key', 'invoice_phone')->update([
            'config_value' => $request->invoice_phone,
        ]);

        DB::table('config')->where('config_key', 'invoice_address')->update([
            'config_value' => $request->invoice_address,
        ]);

        DB::table('config')->where('config_key', 'invoice_city')->update([
            'config_value' => $request->invoice_city,
        ]);

        DB::table('config')->where('config_key', 'invoice_state')->update([
            'config_value' => $request->invoice_state,
        ]);

        DB::table('config')->where('config_key', 'invoice_zipcode')->update([
            'config_value' => $request->invoice_zipcode,
        ]);

        DB::table('config')->where('config_key', 'invoice_country')->update([
            'config_value' => $request->invoice_country,
        ]);

        DB::table('config')->where('config_key', 'tax_name')->update([
            'config_value' => $request->tax_name,
        ]);

        DB::table('config')->where('config_key', 'tax_number')->update([
            'config_value' => $request->tax_number,
        ]);

        DB::table('config')->where('config_key', 'tax_value')->update([
            'config_value' => $request->tax_value,
        ]);

        DB::table('config')->where('config_key', 'invoice_footer')->update([
            'config_value' => $request->invoice_footer,
        ]);


        Toastr::success(trans('Invoice Setting Updated Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.tax.setting');
    }

    public function updateEmailSetting(Request $request)
    {

        DB::table('config')->where('config_key', 'email_heading')->update([
            'config_value' => $request->email_heading,
        ]);

        DB::table('config')->where('config_key', 'email_footer')->update([
            'config_value' => $request->email_footer,
        ]);


        Toastr::success(trans('Email Setting Updated Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.tax.setting');
    }

    public function pages()
    {
        $pages = DB::table('pages')->get()->groupBy('page_name');
        $settings = Setting::first();
        $config = DB::table('config')->get();
        $allPages = array_keys($pages->toArray());
        return view('admin.pages.index', compact('allPages', 'settings', 'config'));
    }

    public function editHomePage(Request $request, $id)
    {
        $sections = DB::table('pages')->where('page_name', $id)->get();
        $settings = Setting::first();
        $config = DB::table('config')->get();

        $section_name = DB::table('pages')->where('page_name', $id)->groupBy('section_name')->orderBy('order_id', 'asc')->get();
        return view('admin.pages.edit-page', compact('sections', 'settings', 'config', 'id', 'section_name'));
    }

    public function updateHomePage(Request $request, $id)
    {
        $_path = 'assets/uploads/banner';
        if (!File::exists($_path)) {
            File::makeDirectory($_path);
        }
        if ($request->banner_title) {
            $banner_title = $request->banner_title;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_title')->update(['section_content' => $banner_title]);
        }

        if ($request->banner_description) {
            $banner_description = $request->banner_description;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_description')->update(['section_content' => $banner_description]);
        }

        if ($request->banner_button) {
            $banner_button = $request->banner_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_button')->update(['section_content' => $banner_button]);
        }


        if ($request->hasFile('banner_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $banner_photo = $request->file('banner_photo');
            $name = time() . '.' . $banner_photo->getClientOriginalExtension();
            Image::make($banner_photo)->save('assets/uploads/banner/' . $name);
            $banner_photo_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_photo')->update(['section_content' => $banner_photo_path]);
        }

        if ($request->hasFile('banner_video')) {
            $rules = [
                'banner_video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'
            ];
            $validator = Validator($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $old_file = DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_video')->first();
            if (!empty($old_file)) {
                if (File::exists(public_path($old_file->section_content))) {
                    File::delete(public_path($old_file->section_content));
                }
            }
            $banner_video = $request->file('banner_video');
            $base_name = preg_replace('/\..+$/', '', $banner_video->getClientOriginalName());
            $video_name = $base_name . "-" . uniqid() . "." . $banner_video->getClientOriginalExtension();
            $file_path = 'assets/uploads/videos';
            if (!File::exists($file_path)) {
                File::makeDirectory($file_path);
            }
            $banner_video->move($file_path, $video_name);
            $video_file = '/' . $file_path . '/' . $video_name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'banner_video')->update(['section_content' => $video_file]);
        }


        if ($request->hasFile('what_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'what_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $what_photo = $request->file('what_photo');
            $name = time() . '.' . $what_photo->getClientOriginalExtension();
            Image::make($what_photo)->save('assets/uploads/banner/' . $name);

            $what_photo_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_photo')->update(['section_content' => $what_photo_path]);
        }


        if ($request->hasFile('feature_card_icon_1')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_1')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_1 = $request->file('feature_card_icon_1');
            $name = time() . '.' . $feature_card_icon_1->getClientOriginalExtension();
            Image::make($feature_card_icon_1)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_1_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_1')->update(['section_content' => $feature_card_icon_1_path]);
        }

        if ($request->hasFile('feature_card_icon_2')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_2')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_2 = $request->file('feature_card_icon_2');
            $name = time() . '.' . $feature_card_icon_2->getClientOriginalExtension();
            Image::make($feature_card_icon_2)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_2_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_2')->update(['section_content' => $feature_card_icon_2_path]);
        }
        if ($request->hasFile('feature_card_icon_3')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_3')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_3 = $request->file('feature_card_icon_3');
            $name = time() . '.' . $feature_card_icon_3->getClientOriginalExtension();
            Image::make($feature_card_icon_3)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_3_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_3')->update(['section_content' => $feature_card_icon_3_path]);
        }

        if ($request->hasFile('feature_card_icon_4')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_4')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_4 = $request->file('feature_card_icon_4');
            $name = time() . '.' . $feature_card_icon_4->getClientOriginalExtension();
            Image::make($feature_card_icon_4)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_4_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_4')->update(['section_content' => $feature_card_icon_4_path]);
        }
        if ($request->hasFile('feature_card_icon_5')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_5')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_5 = $request->file('feature_card_icon_5');
            $name = time() . '.' . $feature_card_icon_5->getClientOriginalExtension();
            Image::make($feature_card_icon_5)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_5_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_5')->update(['section_content' => $feature_card_icon_5_path]);
        }
        if ($request->hasFile('feature_card_icon_6')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_6')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_6 = $request->file('feature_card_icon_6');
            $name = time() . '.' . $feature_card_icon_6->getClientOriginalExtension();
            Image::make($feature_card_icon_6)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_6_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_6')->update(['section_content' => $feature_card_icon_6_path]);
        }
        if ($request->hasFile('feature_card_icon_7')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_7')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_7 = $request->file('feature_card_icon_7');
            $name = time() . '.' . $feature_card_icon_7->getClientOriginalExtension();
            Image::make($feature_card_icon_7)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_7_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_7')->update(['section_content' => $feature_card_icon_7_path]);
        }

        if ($request->what_mini_title) {
            $what_mini_title = $request->what_mini_title;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_mini_title')->update(['section_content' => $what_mini_title]);
        }

        if ($request->hasFile('feature_card_icon_8')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_8')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card_icon_8 = $request->file('feature_card_icon_8');
            $name = time() . '.' . $feature_card_icon_8->getClientOriginalExtension();
            Image::make($feature_card_icon_8)->save('assets/uploads/banner/' . $name);

            $feature_card_icon_8_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_icon_8')->update(['section_content' => $feature_card_icon_8_path]);
        }
        if ($request->hasFile('feature_card9_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card9_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card9_photo = $request->file('feature_card9_photo');
            $name = time() . '.' . $feature_card9_photo->getClientOriginalExtension();
            Image::make($feature_card9_photo)->save('assets/uploads/banner/' . $name);

            $feature_card9_photo_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card9_photo')->update(['section_content' => $feature_card9_photo_path]);
        }

        if ($request->hasFile('feature_card10_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card10_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card10_photo = $request->file('feature_card10_photo');
            $name = time() . '.' . $feature_card10_photo->getClientOriginalExtension();
            Image::make($feature_card10_photo)->save('assets/uploads/banner/' . $name);

            $feature_card10_photo_path = 'assets/uploads/img/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card10_photo')->update(['section_content' => $feature_card10_photo_path]);
        }
        if ($request->hasFile('feature_card11_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card11_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card11_photo = $request->file('feature_card11_photo');
            $name = time() . '.' . $feature_card11_photo->getClientOriginalExtension();
            Image::make($feature_card11_photo)->save('assets/uploads/banner/' . $name);

            $feature_card11_photo_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card11_photo')->update(['section_content' => $feature_card11_photo_path]);
        }

        if ($request->hasFile('feature_card12_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card12_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // __add new image
            $feature_card12_photo = $request->file('feature_card12_photo');
            $name = time() . '.' . $feature_card12_photo->getClientOriginalExtension();
            Image::make($feature_card12_photo)->save('assets/uploads/banner/' . $name);

            $feature_card12_photo_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card12_photo')->update(['section_content' => $feature_card12_photo_path]);
        }

        if ($request->what_mini_title) {
            $what_mini_title = $request->what_mini_title;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_mini_title')->update(['section_content' => $what_mini_title]);
        }
        if ($request->hasFile('feature_card13_photo')) {
            // __delete old image
            $old_data = DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card13_photo')->first();
            if ($old_data) {
                $imagePath = public_path($old_data->section_content);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            // __add new image
            $feature_card13_photo = $request->file('feature_card13_photo');
            $name = time() . '.' . $feature_card13_photo->getClientOriginalExtension();
            Image::make($feature_card13_photo)->save('assets/uploads/banner/' . $name);

            $feature_card13_photo_path = 'assets/uploads/banner/' . $name;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card13_photo')->update(['section_content' => $feature_card13_photo_path]);
        }

        if ($request->what_mini_title) {
            $what_mini_title = $request->what_mini_title;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_mini_title')->update(['section_content' => $what_mini_title]);
        }

        if ($request->what_title) {
            $what_title = $request->what_title;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_title')->update(['section_content' => $what_title]);
        }

        if ($request->what_description) {
            $what_description = $request->what_description;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_description')->update(['section_content' => $what_description]);
        }

        if ($request->what_li_title_1) {
            $what_li_title_1 = $request->what_li_title_1;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_li_title_1')->update(['section_content' => $what_li_title_1]);
        }

        if ($request->what_li_title_2) {
            $what_li_title_2 = $request->what_li_title_2;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_li_title_2')->update(['section_content' => $what_li_title_2]);
        }

        if ($request->what_li_title_3) {
            $what_li_title_3 = $request->what_li_title_3;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_li_title_3')->update(['section_content' => $what_li_title_3]);
        }

        if ($request->what_card_title_1) {
            $what_card_title_1 = $request->what_card_title_1;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_title_1')->update(['section_content' => $what_card_title_1]);
        }
        if ($request->what_card_description_1) {
            $what_card_description_1 = $request->what_card_description_1;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_description_1')->update(['section_content' => $what_card_description_1]);
        }
        if ($request->what_card_title_2) {
            $what_card_title_2 = $request->what_card_title_2;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_title_2')->update(['section_content' => $what_card_title_2]);
        }

        if ($request->what_card_description_2) {
            $what_card_description_2 = $request->what_card_description_2;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_description_2')->update(['section_content' => $what_card_description_2]);
        }

        if ($request->what_card_title_3) {
            $what_card_title_3 = $request->what_card_title_3;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_title_3')->update(['section_content' => $what_card_title_3]);
        }

        if ($request->what_card_description_3) {
            $what_card_description_3 = $request->what_card_description_3;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_description_3')->update(['section_content' => $what_card_description_3]);
        }

        if ($request->what_card_title_4) {
            $what_card_title_4 = $request->what_card_title_4;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_title_4')->update(['section_content' => $what_card_title_4]);
        }
        if ($request->what_card_description_4) {
            $what_card_description_4 = $request->what_card_description_4;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'what_card_description_4')->update(['section_content' => $what_card_description_4]);
        }

        if ($request->feature_card_title_1) {
            $feature_card_title_1 = $request->feature_card_title_1;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_1')->update(['section_content' => $feature_card_title_1]);
        }
        if ($request->feature_card_description_1) {
            $feature_card_description_1 = $request->feature_card_description_1;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_1')->update(['section_content' => $feature_card_description_1]);
        }
        if ($request->feature_card1_button) {
            $feature_card1_button = $request->feature_card1_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card1_button')->update(['section_content' => $feature_card1_button]);
        }


        if ($request->feature_card_title_2) {
            $feature_card_title_2 = $request->feature_card_title_2;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_2')->update(['section_content' => $feature_card_title_2]);
        }

        if ($request->feature_card_description_2) {
            $feature_card_description_2 = $request->feature_card_description_2;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_2')->update(['section_content' => $feature_card_description_2]);
        }
        if ($request->feature_card2_button) {
            $feature_card2_button = $request->feature_card2_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card2_button')->update(['section_content' => $feature_card2_button]);
        }

        if ($request->feature_card_title_3) {
            $feature_card_title_3 = $request->feature_card_title_3;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_3')->update(['section_content' => $feature_card_title_3]);
        }

        if ($request->feature_card_description_3) {
            $feature_card_description_3 = $request->feature_card_description_3;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_3')->update(['section_content' => $feature_card_description_3]);
        }
        if ($request->feature_card3_button) {
            $feature_card3_button = $request->feature_card3_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card3_button')->update(['section_content' => $feature_card3_button]);
        }
        if ($request->feature_card_title_4) {
            $feature_card_title_4 = $request->feature_card_title_4;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_4')->update(['section_content' => $feature_card_title_4]);
        }

        if ($request->feature_card_description_4) {
            $feature_card_description_4 = $request->feature_card_description_4;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_4')->update(['section_content' => $feature_card_description_4]);
        }
        if ($request->feature_card4_button) {
            $feature_card4_button = $request->feature_card4_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card4_button')->update(['section_content' => $feature_card4_button]);
        }

        if ($request->feature_card_title_5) {
            $feature_card_title_5 = $request->feature_card_title_5;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_5')->update(['section_content' => $feature_card_title_5]);
        }

        if ($request->feature_card_description_5) {
            $feature_card_description_5 = $request->feature_card_description_5;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_5')->update(['section_content' => $feature_card_description_5]);
        }
        if ($request->feature_card5_button) {
            $feature_card5_button = $request->feature_card5_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card5_button')->update(['section_content' => $feature_card5_button]);
        }

        if ($request->feature_card_title_6) {
            $feature_card_title_6 = $request->feature_card_title_6;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_6')->update(['section_content' => $feature_card_title_6]);
        }

        if ($request->feature_card_description_6) {
            $feature_card_description_6 = $request->feature_card_description_6;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_6')->update(['section_content' => $feature_card_description_6]);
        }
        if ($request->feature_card6_button) {
            $feature_card6_button = $request->feature_card6_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card6_button')->update(['section_content' => $feature_card6_button]);
        }
        if ($request->feature_card_title_7) {
            $feature_card_title_7 = $request->feature_card_title_7;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_7')->update(['section_content' => $feature_card_title_7]);
        }

        if ($request->feature_card_description_7) {
            $feature_card_description_7 = $request->feature_card_description_7;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_7')->update(['section_content' => $feature_card_description_7]);
        }
        if ($request->feature_card7_button) {
            $feature_card7_button = $request->feature_card7_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card7_button')->update(['section_content' => $feature_card7_button]);
        }
        if ($request->feature_card_title_8) {
            $feature_card_title_8 = $request->feature_card_title_8;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_8')->update(['section_content' => $feature_card_title_8]);
        }

        if ($request->feature_card_description_8) {
            $feature_card_description_8 = $request->feature_card_description_8;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_8')->update(['section_content' => $feature_card_description_8]);
        }
        if ($request->feature_card8_button) {
            $feature_card8_button = $request->feature_card8_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card8_button')->update(['section_content' => $feature_card8_button]);
        }
        if ($request->feature_card_title_9) {
            $feature_card_title_9 = $request->feature_card_title_9;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_9')->update(['section_content' => $feature_card_title_9]);
        }

        if ($request->feature_card_description_9) {
            $feature_card_description_9 = $request->feature_card_description_9;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_9')->update(['section_content' => $feature_card_description_9]);
        }
        if ($request->feature_card9_button) {
            $feature_card9_button = $request->feature_card9_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card9_button')->update(['section_content' => $feature_card9_button]);
        }

        if ($request->feature_card_title_10) {
            $feature_card_title_10 = $request->feature_card_title_10;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_10')->update(['section_content' => $feature_card_title_10]);
        }

        if ($request->feature_card_description_10) {
            $feature_card_description_10 = $request->feature_card_description_10;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_10')->update(['section_content' => $feature_card_description_10]);
        }
        if ($request->feature_card10_button) {
            $feature_card10_button = $request->feature_card10_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card10_button')->update(['section_content' => $feature_card10_button]);
        }
        if ($request->feature_card_title_11) {
            $feature_card_title_11 = $request->feature_card_title_11;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_11')->update(['section_content' => $feature_card_title_11]);
        }

        if ($request->feature_card_description_11) {
            $feature_card_description_11 = $request->feature_card_description_11;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_11')->update(['section_content' => $feature_card_description_11]);
        }
        if ($request->feature_card11_button) {
            $feature_card11_button = $request->feature_card11_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card11_button')->update(['section_content' => $feature_card11_button]);
        }
        if ($request->feature_card_title_12) {
            $feature_card_title_12 = $request->feature_card_title_12;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_title_12')->update(['section_content' => $feature_card_title_12]);
        }

        if ($request->feature_card_description_12) {
            $feature_card_description_12 = $request->feature_card_description_12;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card_description_12')->update(['section_content' => $feature_card_description_12]);
        }
        if ($request->feature_card12_button) {
            $feature_card12_button = $request->feature_card12_button;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'feature_card12_button')->update(['section_content' => $feature_card12_button]);
        }


        if ($request->video_section_title) {
            $video_section_title = $request->video_section_title;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'video_section_title')->update(['section_content' => $video_section_title]);
        }

        if ($request->video_section_content) {
            $video_section_content = $request->video_section_content;
            DB::table('pages')->where('page_name', $id)->where('section_title', 'video_section_content')->update(['section_content' => $video_section_content]);
        }


        // for ($i = 0; $i < count($sections); $i++) {
        //     $safe_section_content = $request->input('section' . $i);
        //     DB::table('pages')->where('page_name', $id)->where('id', $sections[$i]->id)->update(['section_content' => $safe_section_content]);
        // }
        Toastr::success(trans('Website Content Updated Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        Toastr::success(trans('Website Cache Cleared Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    public function testEmail()
    {
        $message = [
            'msg' => 'Test mail'
        ];
        $mail = false;
        try {
            Mail::to(ENV('MAIL_FROM_ADDRESS'))->send(new \App\Mail\TestMail($message));
            $mail = true;
        } catch (\Exception $e) {

            Toastr::success(trans('Email configuration wrong.'), 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        if ($mail == true) {

            Toastr::success(trans('Test mail send successfully.'), 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

}
