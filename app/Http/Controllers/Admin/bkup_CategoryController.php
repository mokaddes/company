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

class CategoryController extends Controller
{

    protected $category;
    public $user;

    public function __construct(Category $category)
    {
        $this->category     = $category;
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
        if (is_null($this->user) || !$this->user->can('admin.category.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Category';
        $data['rows'] = Category::oldest('order_number')->get();
        return view('admin.category.index', compact('data'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.category.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'          => 'required|max:100',
                'order_number'  => 'required',
                'status'        => 'required'
            ]);

            $slug = Str::slug($request->name);
            $check_slug = Category::where('slug',$slug)->first();
            if($check_slug){
                $slug = $slug.'_'.uniqid();
            }

            $category = new Category();
            $category->name         = $request->name;
            $category->slug         = $slug;
            $category->order_number = $request->order_number;
            $category->status       = $request->status;
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.category.index');
        }
        DB::commit();
        Toastr::success(trans('Category Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $category = Category::find($id);
        $html = view('admin.category.edit', compact('category'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.category.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $slug = Str::slug($request->name);
            $check_slug = Category::where('id','!=',$id)->where('slug',$slug)->first();
            if($check_slug){
                $slug = $slug.'_'.uniqid();
            }

            $category = Category::find($id);
            $category->name         = $request->name;
            $category->slug         = $slug;
            $category->order_number = $request->order_number;
            $category->status       = $request->status;
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.category.index');
        }
        DB::commit();
        Toastr::success(trans('Category Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.category.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $check = SubCategory::where('category_id',$id)->first();
        if($check){
            Toastr::error(trans('Delete subcategory first then you can delete category !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.category.index');
        }

        DB::beginTransaction();
        try {
            $category = Category::find($id);
            $category->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.category.index');
        }
        DB::commit();
        Toastr::success(trans('Category Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.category.index');
    }





}
