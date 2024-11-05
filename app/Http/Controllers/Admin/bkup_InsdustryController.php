<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Industry;

class InsdustryController extends Controller
{
    public function index()
    {
        $insdustry = Industry::orderBy('id', 'desc')->get();
        return view('admin.insdustry.index',compact('insdustry'));
    }

    public function store(Request $request){

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $insdustry = new Industry();

            $insdustry->name = $request->name;

            $insdustry->slug = Str::slug($request->name);
            $insdustry->order_number = $request->order_number;
            $insdustry->status = $request->status;
            $insdustry->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Industry not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.industry.index');
        }
        DB::commit();
        Toastr::success(trans('Industry Successfully Created!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.industry.index');
    }

    public function edit($id)
    {
        $insdustry = Industry::find($id);
        $html = view('admin.insdustry.edit', compact('insdustry'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'          => 'required|max:100',
                'order_number'  => 'required',
                'status'        => 'required'
            ]);

            $insdustry = Industry::find($id);

            $insdustry->name = $request->name;
            $insdustry->slug = Str::slug($request->name);
            $insdustry->order_number = $request->order_number;
            $insdustry->status = $request->status;
            $insdustry->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Industry not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.industry.index');
        }
        DB::commit();
        Toastr::success(trans('Industry Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.industry.index');
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $insdustry = Industry::find($id);
            $insdustry->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Industry not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.industry.index');
        }
        DB::commit();
        Toastr::success(trans('Industry Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.industry.index');
    }

}
