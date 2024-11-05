<?php

namespace App\Http\Controllers\Admin;

use App\Models\Franchise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class FranchisesController extends Controller
{
    public function index()
    {
        $franchises = Franchise::all();
        return view('admin.franchise.index', compact('franchises'));
    }

    public function create()
    {
        return view('admin.franchise.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'banner_image' => 'required',
            'thumbnail' => 'required',
            'min_hand_cash' => 'required',
            'investment' => 'required',
            'net_worth' => 'required',
        ], [
            'min_hand_cash.required' => 'Minimum Cash on Hand field id required.',
            'investment.required' => 'Total investment field id required.'
        ]);

        if ($request->file('thumbnail')) {
            $thumbnail = uploadImage($request->thumbnail, 'franchises', 250, 200);
        }
        if ($request->file('banner_image')) {
            $banner_image = uploadImage($request->banner_image, 'franchises', 850, 400);
        }

        $slug = Str::slug($request->title);
        $old_slug = Franchise::where('slug', $slug)->first();

        $franchise = new Franchise();
        $franchise->title = $request->title;
        $franchise->slug = $slug;
        $franchise->description = $request->description;
        $franchise->min_hand_cash = $request->min_hand_cash;
        $franchise->investment = $request->investment;
        $franchise->net_worth = $request->net_worth;
        $franchise->financing_availability = $request->financing_availability;
        $franchise->founded_year = $request->founded_year;
        $franchise->franchising_start = $request->franchising_start;
        $franchise->opportunities = $request->opportunities;
        $franchise->awards = $request->awards;
        $franchise->testimonials = $request->testimonials;
        $franchise->video = $request->video;
        $franchise->franchise_fee = $request->franchise_fee;
        $franchise->royalty_fee = $request->royalty_fee;
        $franchise->ad_fee = $request->ad_fee;
        $franchise->units_number = $request->units_number;
        $franchise->order_number = $request->order_number ?? 0;
        $franchise->status = $request->status;
        $franchise->thumbnail = $thumbnail;
        $franchise->banner_image = $banner_image;
        $franchise->save();


        if ($old_slug) {
            $slug = $slug . '_' . $franchise->id;
            $franchise->update(['slug' => $slug]);
        }

        Toastr::success(trans('Franchise has been created successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.franchises.index');
    }
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'min_hand_cash' => 'required',
            'investment' => 'required',
            'net_worth' => 'required',
        ], [
            'min_hand_cash.required' => 'Minimum Cash on Hand field id required.',
            'investment.required' => 'Total investment field id required.'
        ]);

        $franchise = Franchise::where('slug', $slug)->first();
        if ($request->file('thumbnail')) {
            if (File::exists($franchise->thumbnail)) {
                File::delete($franchise->thumbnail);
            }
            $thumbnail = uploadImage($request->thumbnail, 'franchises', 250, 200);
            $franchise->thumbnail = $thumbnail;
        }
        if ($request->file('banner_image')) {
            if (File::exists($franchise->banner_image)) {
                File::delete($franchise->banner_image);
            }
            $banner_image = uploadImage($request->banner_image, 'franchises', 850, 400);
            $franchise->banner_image = $banner_image;
        }

        $franchise->title = $request->title;
        $franchise->description = $request->description;
        $franchise->min_hand_cash = $request->min_hand_cash;
        $franchise->investment = $request->investment;
        $franchise->net_worth = $request->net_worth;
        $franchise->financing_availability = $request->financing_availability;
        $franchise->founded_year = $request->founded_year;
        $franchise->franchising_start = $request->franchising_start;
        $franchise->opportunities = $request->opportunities;
        $franchise->awards = $request->awards;
        $franchise->testimonials = $request->testimonials;
        $franchise->video = $request->video;
        $franchise->franchise_fee = $request->franchise_fee;
        $franchise->royalty_fee = $request->royalty_fee;
        $franchise->ad_fee = $request->ad_fee;
        $franchise->units_number = $request->units_number;
        $franchise->order_number = $request->order_number ?? 0;
        $franchise->status = $request->status;
        $franchise->save();

        Toastr::success(trans('Franchise has been updated successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.franchises.index');
    }

    public function edit($slug)
    {
        $franchise = Franchise::where('slug', $slug)->first();
        return view('admin.franchise.edit', compact('franchise'));
    }

    public function view($slug)
    {
        $franchise = Franchise::where('slug', $slug)->first();
        return view('admin.franchise.view', compact('franchise'));
    }

    public function delete($id)
    {
        try {
            $franchise = Franchise::find($id);
            if (File::exists($franchise->thumbnail)) {
                File::delete($franchise->thumbnail);
            }
            if (File::exists($franchise->banner_image)) {
                File::delete($franchise->banner_image);
            }
            $franchise->delete();
            Toastr::success(trans('Franchise has been deleted successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        } catch (\Throwable $th) {
            Toastr::success(trans('Something wrong !'), 'Error', ["positionClass" => "toast-top-center"]);
        }

        return back();
    }
}
