<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function index()
    {
        $data['title'] =  __('messages.common.home_page_content');
        $home = HomeContent::first();
        return view('admin.home_content.index' ,compact('data', 'home'));
    }

    public function update(Request $request)
    {
        dd($request->all());

        $this->validate($request, [
            'banner_heading_en'          => 'required|max:60',
            'banner_heading_gr'          => 'required|max:60',
            'bannerSubheading_en'          => 'required|max:120',
            'bannerSubheading_gr'          => 'required|max:120',
            'hiws_heading_en'          => 'required|max:20',
            'hiws_heading_gr'          => 'required|max:20',
            'hiws_subheading_en'          => 'required|max:160',
            'hiws_subheading_gr'          => 'required|max:160',
            'hiws_title_en'          => 'required|max:70',
            'hiws_title_gr'          => 'required|max:90',
            'hiws_description_en'          => 'required|max:550',
            'hiws_description_gr'          => 'required|max:680',
            'card1_title_en'          => 'required|max:40',
            'card1_title_gr'          => 'required|max:40',
            'card1_subtitle_en'          => 'required|max:120',
            'card1_subtitle_gr'          => 'required|max:200',
            'card2_title_en'          => 'required|max:40',
            'card2_title_gr'          => 'required|max:40',
            'card2_subtitle_en'          => 'required|max:120',
            'card2_subtitle_gr'          => 'required|max:200',
            'card3_title_en'          => 'required|max:40',
            'card3_title_gr'          => 'required|max:40',
            'card3_subtitle_en'          => 'required|max:120',
            'card3_subtitle_gr'          => 'required|max:200',
            'card4_title_en'          => 'required|max:40',
            'card4_title_gr'          => 'required|max:40',
            'card4_subtitle_en'          => 'required|max:120',
            'card4_subtitle_gr'          => 'required|max:200',
            'price_heading_en'          => 'required|max:20',
            'price_heading_gr'          => 'required|max:20',
            'price_subheading_en'          => 'required|max:160',
            'price_subheading_gr'          => 'required|max:180',
            'faq_heading_en'          => 'required|max:30',
            'faq_heading_gr'          => 'required|max:30',
            'faq_subheading_en'          => 'required|max:105',
            'faq_subheading_gr'          => 'required|max:115',
            'hero_content_en'          => 'required|max:50',
            'hero_content_gr'          => 'required|max:70',
            'testimonial_heading_en'          => 'required|max:255',
            'testimonial_heading_gr'          => 'required|max:255',
        ]);

        try {
            $home           =  HomeContent::find(1);
            $home->col1_en  = $request->banner_heading_en;
            $home->col1_gr  = $request->banner_heading_gr;
            $home->col2_en  = $request->bannerSubheading_en;
            $home->col2_gr  = $request->bannerSubheading_gr;
            $home->col3_en  = $request->hiws_heading_en;
            $home->col3_gr  = $request->hiws_heading_gr;
            $home->col4_en  = $request->hiws_subheading_en;
            $home->col4_gr  = $request->hiws_subheading_gr;
            $home->col5_en  = $request->hiws_title_en;
            $home->col5_gr  = $request->hiws_title_gr;
            $home->col6_en  = $request->hiws_description_en;
            $home->col6_gr  = $request->hiws_description_gr;
            $home->col7_en  = $request->card1_title_en;
            $home->col7_gr  = $request->card1_title_gr;
            $home->col8_en  = $request->card1_subtitle_en;
            $home->col8_gr  = $request->card1_subtitle_gr;
            $home->col9_en  = $request->card2_title_en;
            $home->col9_gr  = $request->card2_title_gr;
            $home->col10_en = $request->card2_subtitle_en;
            $home->col10_gr = $request->card2_subtitle_gr;
            $home->col11_en = $request->card3_title_en;
            $home->col11_gr = $request->card3_title_gr;
            $home->col12_en = $request->card3_subtitle_en;
            $home->col12_gr = $request->card3_subtitle_gr;
            $home->col13_en = $request->card4_title_en;
            $home->col13_gr = $request->card4_title_gr;
            $home->col14_en = $request->card4_subtitle_en;
            $home->col14_gr = $request->card4_subtitle_gr;
            $home->col15_en = $request->price_heading_en;
            $home->col15_gr = $request->price_heading_gr;
            $home->col16_en = $request->price_subheading_en;
            $home->col16_gr = $request->price_subheading_gr;
            $home->col17_en = $request->faq_heading_en;
            $home->col17_gr = $request->faq_heading_gr;
            $home->col18_en = $request->faq_subheading_en;
            $home->col18_gr = $request->faq_subheading_gr;
            $home->col19_en = $request->hero_content_en;
            $home->col19_gr = $request->hero_content_gr;
            $home->col20_en = $request->testimonial_heading_en;
            $home->col21_gr = $request->testimonial_heading_gr;

            if ($request->image) {
                $banner_file = $request->file('image');
                $base_name = preg_replace('/\..+$/', '', $banner_file->getClientOriginalName());
                $base_name = implode('-', explode(' ', $base_name));
                $base_name = Str::lower($base_name);
                $file_extension = $banner_file->getClientOriginalExtension();
                $file_type = $banner_file->getMimeType();

                // Check if the file is an image or a video
                if (str_contains($file_type, 'image')) {
                    $home->file_type = 'image';
                } elseif (str_contains($file_type, 'video')) {
                    $home->file_type = 'video';
                }

                // Generate a unique name for the file
                $file_name = $base_name . "-" . uniqid() . "." . $file_extension;
                $file_path = '/assets/uploads/banner';
                $banner_file->move(public_path($file_path), $file_name);

                // Save the path to the file in the database
                $home->image = $file_path . '/' . $file_name;
            }

            if ($request->faq_image) {
                $banner_image = $request->file('faq_image');
                $base_name = preg_replace('/\..+$/', '', $banner_image->getClientOriginalName());
                $base_name = explode(' ', $base_name);
                $base_name = implode('-', $base_name);
                $base_name = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $banner_image->getClientOriginalExtension();
                $file_path = '/assets/uploads/faq';
                $banner_image->move(public_path($file_path), $image_name);
                $home->faq_image = $file_path . '/' . $image_name;
            }

            $home->update();


        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', __('messages.toastr.home_content_error'));
        }
        Toastr::success(__('messages.toastr.home_content_success'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
