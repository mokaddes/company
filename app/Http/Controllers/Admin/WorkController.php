<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WorkController extends Controller
{
    public function index()
    {
        $data['title'] = 'Work';
        $data['works'] = Work::all();
        return view('admin.work.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Add Work';
        return view('admin.work.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'list_title' => 'required|string|max:250',
            'subtitle' => 'required|string|max:250',
            'brand' => 'required|string|max:250',
            'background_color' => 'required|string|max:250',
            'button_text' => 'required|string|max:250',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:250',
            'category' => 'required|string|max:250',
            'brief' => 'nullable|max:500',
            'result' => 'nullable|max:500',
            'procedure' => 'nullable|max:500',
            'client_quote' => 'nullable|max:500',
            'client_name' => 'nullable|max:500',
        ]);

        try {
            DB::beginTransaction();
            $work = new Work();
            $this->saveWork($request, $work);
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Something went wrong !', 'Error', ["positionClass" => "toast-top-center"]);
            return back()->withInput();
        }
        DB::commit();
        Toastr::success('Work Added Successfully!', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.work.index');

    }

    public function edit($id)
    {
        $data['title'] = 'Edit Work';
        $data['work'] = Work::find($id);
        return view('admin.work.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'list_title' => 'required|string|max:250',
            'subtitle' => 'required|string|max:250',
            'brand' => 'required|string|max:250',
            'background_color' => 'required|string|max:250',
            'button_text' => 'required|string|max:250',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:250',
            'category' => 'required|string|max:250',
            'brief' => 'nullable|max:500',
            'result' => 'nullable|max:500',
            'procedure' => 'nullable|max:500',
            'client_quote' => 'nullable|max:500',
            'client_name' => 'nullable|max:500',
        ]);

        try {
            DB::beginTransaction();
            $work = Work::find($id);
            $this->saveWork($request, $work);
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Something went wrong !', 'Error', ["positionClass" => "toast-top-center"]);
            return back()->withInput();
        }
        DB::commit();
        Toastr::success('Work Updated Successfully!', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.work.index');
    }

    public function delete($id)
    {
        $work = Work::find($id);
        $work->delete();
        Toastr::success('Work Deleted Successfully!', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.work.index');
    }

    /**
     * @param Request $request
     * @param Work $work
     * @return void
     */
    private function saveWork(Request $request, Work $work): void
    {
        if ($request->hasFile('thumbnail')) {
            if (File::exists($work->thumbnail)) {
                File::delete($work->thumbnail);
            }
            $thumb = $request->file('thumbnail');
            $upload = uploadGeneralFile($thumb, 'works');
            $work->thumbnail = $upload['path'];
        }
        if ($request->hasFile('image')) {
            if (File::exists($work->image)) {
                File::delete($work->image);
            }
            $file = $request->file('image');
            $upload = uploadGeneralFile($file, 'works');
            $work->image = $upload['path'];
        }
        $work->list_title = $request->list_title;
        $work->subtitle = $request->subtitle;
        $work->brand = $request->brand;
        $work->background_color = $request->background_color;
        $work->button_text = $request->button_text;
        $work->title = $request->title;
        $work->category = $request->category;
        $work->brief = $request->brief;
        $work->result = $request->result;
        $work->procedures = $request->procedures;
        $work->client_quote = $request->client_quote;
        $work->client_name = $request->client_name;
        $work->status = $request->status ?? 0 ;
        $work->order_number = $request->order_number;

        // meta
        $work->meta_title = $request->meta_title;
        $work->meta_description = $request->meta_description;
        $work->meta_keywords = $request->meta_keywords;
        $work->save();
    }
}
