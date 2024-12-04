<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class WhyUseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Why Use';
        $data['items'] = WhyUse::orderBy('order_number')->get();
        return view('admin.why-use.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Why Use Create';
        return view('admin.why-use.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:why_uses,title|max:255',
            'icon' => 'required|image|max:2048',
            'order_number' => 'required|numeric',
            'status' => 'required',
            'description' => 'required|max:500',
        ]);

        $whyUse = new WhyUse();
        $this->saveWhyUse($request, $whyUse);
        Toastr::success('Why Use created successfully', 'Success');
        return redirect()->route('admin.why-use.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Why Use Edit';
        $data['item'] = WhyUse::find($id);
        return view('admin.why-use.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255|unique:why_uses,title,' . $id,
            'icon' => 'nullable|image|max:2048',
            'order_number' => 'required|numeric',
            'status' => 'required',
            'description' => 'required|max:500',
        ]);

        $whyUse = WhyUse::find($id);
        $this->saveWhyUse($request, $whyUse);
        Toastr::success('Why Use updated successfully', 'Success');
        return redirect()->route('admin.why-use.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        WhyUse::find($id)->delete();
        Toastr::success('Why Use deleted successfully', 'Success');
        return redirect()->route('admin.why-use.index');
    }

    /**
     * @param Request $request
     * @param $whyUse
     * @return void
     */
    private function saveWhyUse(Request $request, $whyUse): void
    {
        $whyUse->title = $request->title;
        $whyUse->order_number = $request->order_number;
        $whyUse->status = $request->status;
        $whyUse->description = $request->description;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $upload = uploadGeneralFile($file, 'why-use');
            $whyUse->icon = $upload['path'];
        }
        $whyUse->save();
    }
}
