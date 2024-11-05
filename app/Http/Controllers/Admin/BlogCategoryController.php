<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    public $user;
    protected $bcat;
    public function __construct(BlogCategory $bcat)
    {
        $this->bcat     = $bcat;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-category.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']  = 'Blog Category';
        $data['rows']   = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.blog.category.index', compact('data'));
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-category.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $blog_category = new BlogCategory();

            $blog_category->name = $request->name;

            $blog_category->slug = Str::slug($request->name);
            $blog_category->order_number = $request->order_number;
            $blog_category->status = $request->status;
            $blog_category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post Category not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog-category.index');
        }
        DB::commit();
        Toastr::success(trans('Category Added Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog-category.index');
    }
    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $blog_category = BlogCategory::find($id);
        // dd($blog_category);
        $html = view('admin.blog.category.edit', compact('blog_category'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.blog-category.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $blog_category = BlogCategory::find($id);

            $blog_category->name = $request->name;
            $blog_category->slug = Str::slug($request->name);
            $blog_category->order_number = $request->order_number;
            $blog_category->status = $request->status;
            $blog_category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog-category.index');
        }
        DB::commit();
        Toastr::success(trans('Category Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog-category.index');
    }

    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.blog-category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $blog_category = BlogCategory::find($id);
            $blog_category->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog-category.index');
        }
        DB::commit();
        Toastr::success(trans('Category Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog-category.index');
    }

}
