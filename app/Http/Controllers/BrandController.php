<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{

    // protected $brand;
    // public function __construct(BrandRepositories $brand)
    // {
    //     $this->brand = $brand;
    // }

    public function view(){
        $brands = Brand::paginate(10);
        // dd($brands);
        return view('admin.brand.index', compact('brands'));
    }
    public function create(){
        // if(!usercan('brand.create')){
        //     return abort(403);
        // }
        $categories = Category::where('status',1)->get();
        return view('admin.brand.create', compact('categories'));
        
    }
    public function store(Request $request){
        try{
            if (!userCan('brand.create')) {
                return abort(403);
            }

            $this->brand->store($request);
            flashSuccess('Brand Added Successfully');
        }catch(\Throwable $th){
            flashError();
            return back(); 

        }
    }

 
    public function edit(Brand $brand)
    {
        if (!userCan('brand.update')) {
            return abort(403);
        }
        $categories = Category::where('status', 1)->get();
        return view('brand::edit', compact('brand', 'categories'));
    }
 
    public function update(BrandFormRequest $request, Brand $brand)
    {
        if (!userCan('brand.update')) {
            return abort(403);
        }
        try {
            $this->brand->update($request, $brand);

            flashSuccess('Brand Updated Successfully');
            return redirect(route('module.brand.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }
    public function destroy(Brand $brand)
    {
        if (!userCan('brand.delete')) {
            return abort(403);
        }

        try {
            $this->brand->destroy($brand);

            flashSuccess('Brand Deleted Successfully');
            return redirect(route('module.brand.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }
    public function show(Brand $brand){
        $brand->loadCount('ads');
        $ads = $brand->ads;

        return view('brand::show', compact('brand','ads'));
    }
}
        

    

