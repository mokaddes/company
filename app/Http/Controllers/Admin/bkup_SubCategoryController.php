<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    protected $subcategory;
    public $user;

    public function __construct(SubCategory $subcategory)
    {
        $this->subcategory     = $subcategory;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the categories.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.subcategory.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Sub Category';
        $data['rows'] = SubCategory::oldest('order_number')->get();
        $data['categories'] = Category::oldest('order_number')->get();
        return view('admin.subcategory.index', compact('data'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.subcategory.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'          => 'required|max:100',
                'category_id'   => 'required',
                'order_number'  => 'required',
                'status'        => 'required'
            ]);

            $slug = Str::slug($request->name);
            $check_slug = SubCategory::where('slug',$slug)->first();
            if($check_slug){
                $slug = $slug.'_'.uniqid();
            }

            $category = new SubCategory();
            $category->name         = $request->name;
            $category->category_id  = $request->category_id;
            $category->slug         = $slug;
            $category->order_number = $request->order_number;
            $category->status       = $request->status;
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Sub Category not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.subcategory.index');
        }
        DB::commit();
        Toastr::success(trans('Sub Category Added Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.subcategory.index');
    }


    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.subcategory.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['row'] = SubCategory::find($id);
        $data['categories'] = Category::oldest('order_number')->get();
        $html = view('admin.subcategory.edit', compact('data'))->render();
        return response()->json($html);

    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.subcategory.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'              => 'required|max:100',
                'order_number'      => 'required',
                'status'            => 'required',
                'category_id'       => 'required',
            ]);

            $slug = Str::slug($request->name);
            $check_slug = SubCategory::where('id','!=',$id)->where('slug',$slug)->first();
            if($check_slug){
                $slug = $slug.'_'.uniqid();
            }


            $category = SubCategory::find($id);
            $category->name         = $request->name;
            $category->category_id  = $request->category_id;
            $category->slug         = $slug;
            $category->order_number = $request->order_number;
            $category->status       = $request->status;
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Sub Category not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.subcategory.index');
        }
        DB::commit();
        Toastr::success(trans('Sub Category Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.subcategory.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.subcategory.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $category = SubCategory::find($id);
            $category->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Sub Category not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.subcategory.index');
        }
        DB::commit();
        Toastr::success(trans('Sub Category Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.subcategory.index');
    }




}
