<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{

    protected $lang;
    public $user;

    public function __construct(Language $lang)
    {
        $this->lang     = $lang;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.settings.language')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']  = 'Language List';
        $data['rows']   = Language::all();

        return view('admin.settings.language.index',compact('data'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.settings.language.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $this->validate($request, [
            'name'          => 'required|unique:languages',
            'code'          => 'required|max:10',
            'direction'     => 'required',
        ]);

        DB::beginTransaction();
        try {

            $language = new Language();
            $language->name         = $request->name;
            $language->code         = $request->code;
            $language->icon         = $request->code;
            $language->direction    = $request->direction;
            $language->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(trans('Language not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.settings.language');
        }
        DB::commit();
        Toastr::success(trans('Language Added Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.settings.language');
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.settings.language.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $language = Language::find($id);
        $html = view('admin.settings.language.edit', compact('language'))->render();
        return response()->json($html);
    }


    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.settings.language.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $this->validate($request, [
            'name'   => 'unique:languages,name,'.$id,
            'code'   => 'max:10'
        ]);

        DB::beginTransaction();
        try {
            $language = Language::find($id);
            $language->name         = $request->name;
            $language->code         = $request->code;
            $language->icon         = $request->code;
            $language->direction    = $request->direction;
            $language->update();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(trans('Language not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.settings.language');
        }
        DB::commit();
        Toastr::success(trans('Language Updated Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.settings.language');
    }


    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.settings.language.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $language = Language::find($id);
            $language->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Language not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.settings.language');
        }
        DB::commit();
        Toastr::success(trans('Language Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.settings.language');
    }

}
