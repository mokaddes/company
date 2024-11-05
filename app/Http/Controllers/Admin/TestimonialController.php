<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    protected $testimonial;
    public $user;
    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial    = $testimonial;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        

        $data['title']  = __('messages.common.testimonial');
        $data['testimonials'] = Testimonial::orderBy('order_id')->get();
        return view('admin.testimonial.index', $data);
    }

    public function create()
    {
        $data['title']  = __('messages.testimonial.testimonial_create');
        return view('admin.testimonial.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.testimonial.store')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'details' => 'required',
            'details_de' => 'required',
        ]);

        try {

            $testimonial = new Testimonial();

            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->details = $request->details;
            $testimonial->details_de = $request->details_de;
            $testimonial->order_id = $request->order_id ?? Testimonial::max('order_id') + 1;
            $testimonial->status = $request->status;
            $testimonial->created_by = auth('admin')->id();

            if ($request->hasFile('image')) {

                // Upload and save the new image
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'uploads/testimonial';
                $image->move(public_path($file_path), $image_name);
                $testimonial->image  = $file_path . '/' . $image_name;

            }


            $testimonial->save();
        } catch (\Exception $e) {
            Toastr::error(__('messages.testimonial.create_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.testimonial.index');
        }
        Toastr::success(__('messages.testimonial.create_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.testimonial.index');
    }

    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.testimonial.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $title = __('messages.testimonial.testimonial_edit');
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial','title'));
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.testimonial.update')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'details' => 'required',
            'details_de' => 'required',
        ]);

        
        try {
            $testimonial = Testimonial::find($id);
            $testimonial->name = $request->name;
            $testimonial->details = $request->details;
            $testimonial->designation = $request->designation;
            $testimonial->details_de = $request->details_de;
            $testimonial->order_id = $request->order_id ?? Testimonial::max('order_id') + 1;
            $testimonial->status = $request->status;
            $testimonial->created_by = auth('admin')->id();

            if ($request->hasFile('image')) {

                // Delete the existing image file if it exists
                if (File::exists(public_path($testimonial->image))) {
                    File::delete(public_path($testimonial->image));
                }

                // Upload and save the new image
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'uploads/testimonial';
                $image->move(public_path($file_path), $image_name);
                $testimonial->image  = $file_path . '/' . $image_name;

            }


            $testimonial->save();
        } catch (\Exception $e) {
            Toastr::error(__('messages.testimonial.uppdate_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.testimonial.index');
        }
        Toastr::success(__('messages.testimonial.update_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.testimonial.index');
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.testimonial.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }


        try {
            $testimonial = Testimonial::find($id);
            // Delete the associated image file if it exists
            if (File::exists(public_path($testimonial->image))) {
                File::delete(public_path($testimonial->image));
            }
            $testimonial->delete();
        } catch (\Exception $e) {
            Toastr::error(__('messages.testimonial.delete_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.testimonial.index');
        }
        Toastr::success(__('messages.testimonial.delete_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.testimonial.index');
    }

    public function view($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.testimonial.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }


        $data['title']  = 'Testimonial View';
        $data['testimonial'] = Testimonial::find($id);
        return view('admin.testimonial.view', $data);
    }
}
