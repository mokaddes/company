<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


class FaqController extends Controller
{
    protected $faq;
    public $user;

    public function __construct(Faq $faq)
    {
        $this->faq     = $faq;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.faq.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = __('messages.common.faq_list');
        $data['rows'] = Faq::get();
        return view('admin.faq.index', compact('data'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $data['title'] = __('messages.common.faq_create');
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'title_de' => 'required',
            'body_de' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $faq                   = new Faq();
            $faq->title            = $request->title;
            $faq->body             = $request->body;
            $faq->title_de         = $request->title_de;
            $faq->body_de          = $request->body_de;
            $faq->is_active        = $request->is_active;
            $faq->order_id         = Faq::max('order_id') + 1;
            $faq->created_by       = Auth::user()->id;
            $faq->created_at       = date('Y-m-d H:i:s');
            $faq->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.faq_create_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return back();
        }
        DB::commit();
        Toastr::success(__('messages.toastr.faq_create_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.faq.index');
    }


    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = __('messages.common.faq_edit');
        $data['row'] = Faq::find($id);
        return view('admin.faq.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'title_de' => 'required',
            'body_de' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $faq                   = Faq::findOrFail($id);
            $faq->title            = $request->title;
            $faq->body             = $request->body;
            $faq->title_de         = $request->title_de;
            $faq->body_de          = $request->body_de;
            $faq->is_active        = $request->is_active;
            $faq->order_id         = $request->order_id;
            $faq->updated_by       = Auth::user()->id;
            $faq->updated_at       = date('Y-m-d H:i:s');
            $faq->save();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error(__('messages.toastr.faq_update_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return back();
        }
        DB::commit();
        Toastr::success(__('messages.toastr.faq_update_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.faq.index');
    }


    public function view($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.view')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = __('messages.common.faq_view');
        $data['row'] = Faq::find($id);

        return view('admin.faq.view', compact('data'));
    }



    public function delete($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $faq = Faq::findOrFail($id);
        $faq->delete();
        Toastr::success(__('messages.toastr.faq_delete'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
