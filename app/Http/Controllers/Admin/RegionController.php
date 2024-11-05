<?php


namespace App\Http\Controllers\Admin;

use DB;
use App\Models\City;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{

    protected $region;
    public $user;

    public function __construct(Region $region)
    {
        $this->region     = $region;
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
        if (is_null($this->user) || !$this->user->can('admin.region.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']      = 'Region';
        $data['rows']       = Region::oldest('code')->get();
        $data['country']    = DB::table('countries')->orderBy('name')->get();
        // dd($data['rows']);
        return view('admin.region.index', compact('data'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.region.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'          => 'required|max:100',
                'code'          => 'required',
                'country_id'    => 'required',
            ]);

            $region               = new Region();
            $region->name         = $request->name;
            $region->country_id   = $request->country_id;
            $region->code         = $request->code;

            $region->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(trans('Region not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.region.index');
        }
        DB::commit();
        Toastr::success(trans('Region Added Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.region.index');
    }

    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.region.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $region    = Region::find($id);
        $country   = DB::table('countries')->orderBy('name')->get();
        $html      = view('admin.region.edit', compact('region','country'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.region.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'code'  => 'required',
            ]);

            $region = Region::find($id);
            $region->name       = $request->name;
            $region->code       = $request->code;
            $region->country_id = $request->country_id;
            $region->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Region not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.region.index');
        }
        DB::commit();
        Toastr::success(trans('Region Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.region.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.region.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $check = City::where('region_id',$id)->first();
        if($check){
            Toastr::error(trans('Delete city first then you can delete region !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.region.index');
        }

        DB::beginTransaction();
        try {
            $region = Region::find($id);
            $region->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Region not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.region.index');
        }
        DB::commit();
        Toastr::success(trans('Region Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.region.index');
    }





}
