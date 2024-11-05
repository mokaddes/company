<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class SeoController extends Controller
{
    public $user;
    protected $seo;

    public function __construct(Seo $seo)
    {
        $this->seo  = $seo;
       $this->middleware(function ($request, $next) {
             $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function index()
    {
       if (is_null($this->user) || !$this->user->can('admin.seo.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
       }

        $data['title']  = __('messages.common.seo');
        $data['rows']   =  Seo::orderBy('id', 'desc')->get();
        return view('admin.seo.index',compact('data'));
    }

    public function edit($id)
    {
      if (is_null($this->user) || !$this->user->can('admin.seo.index')) {
           abort(403, 'Sorry !! You are Unauthorized.');
      }

       $data['title']  = __('messages.seo.seo_edit');
       $data['seo']   =  Seo::where('id',$id)->first();
       return view('admin.seo.edit',compact('data'));
    }

    public function update(Request $request, $page)
    {
        $request->validate([
            'title' => 'required|max:60',
            'keywords' => 'required|max:160',
            'description' => 'required|max:160',
        ]);

        try {

            $page = Seo::where('page_slug', $page)->first();
            // $keywordValues = json_decode($request->keywords);
            // $keywordValues = array_column($keywordValues, 'value');
            // $keywordsString = implode(',', $keywordValues);
            $page->title = $request->title;
            $page->description = $request->description;
            $page->keywords = $request->keywords;

            if ($request->hasFile('image')) {
                // Delete the existing image file if it exists
                if (File::exists(public_path($page->image))) {
                    File::delete(public_path($page->image));
                }
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'uploads/seo';
                $image->move(public_path($file_path), $image_name);
                $page->image  = $file_path . '/' . $image_name;
            }

            $page->save();
        } catch (\Exception $e) {
            Toastr::error(__('messages.toastr.seo_update_error'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        Toastr::success(__('messages.toastr.seo_update_success'), trans('Success'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.seo.index');
    }

    public function view($id)
    {

       if (is_null($this->user) || !$this->user->can('admin.seo.view')) {
           abort(403, 'Sorry !! You are Unauthorized.');
       }

       $data['row']= Seo::find($id);
       $html = view('admin.seo.view', compact('data'))->render();
       return response()->json($html);
    }


    public function delete($id)
    {
       if (is_null($this->user) || !$this->user->can('admin.seo.delete')) {
           abort(403, 'Sorry !! You are Unauthorized.');
       }

       DB::beginTransaction();
       try {
           $seo = Seo::find($id);
           $seo->delete();
       } catch (\Exception $e) {
           DB::rollback();
           Toastr::error(trans('An unexpected error occured while deleting seo'), 'Error', ["positionClass" => "toast-top-right"]);
           return redirect()->route('admin.seo.index');
       }
       DB::commit();
       Toastr::success(trans('Seo Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-right"]);
       return redirect()->route('admin.seo.index');
    }



}
