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

class CityController extends Controller
{

    protected $city;
    public $user;

    public function __construct(city $city)
    {
        $this->city     = $city;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the .
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.city.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'City';
        $data['country']    = DB::table('countries')->orderBy('name')->get();
        $data['region']     = DB::table('regions')->orderBy('name')->get();
        $data['rows'] = City::oldest('name')->get();
        return view('admin.city.index', compact('data'));
    }


    public function CountryWiseRegion($countryId)
    {
        $data = Region::where('country_id', $countryId)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.city.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        DB::beginTransaction();
        $this->validate($request, [
            'name'        => 'required|max:100',
            'country_id'  => 'required',
            'region_id'   => 'required'
        ]);

        try {

            $city = new City();
            $city->name         = $request->name;
            $city->country_id   = $request->country_id;
            $city->region_id    = $request->region_id;
            $city->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(trans('city not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.city.index');
        }
        DB::commit();
        Toastr::success(trans('City Created Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.city.index');
    }

    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.city.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $city = City::find($id);
        $country    = DB::table('countries')->orderBy('name')->get();
        $region     = DB::table('regions')->where('country_id',$city->country_id)->orderBy('name')->get();
        $html = view('admin.city.edit', compact('city', 'country', 'region'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.city.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        $this->validate($request, [
            'name'        => 'required|max:100',
            'country_id'  => 'required',
            'region_id'   => 'required'
        ]);
        try {

            $city = City::find($id);
            $city->name         = $request->name;
            $city->country_id   = $request->country_id;
            $city->region_id    = $request->region_id;
            $city->update();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('City not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.city.index');
        }
        DB::commit();
        Toastr::success(trans('City Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.city.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.city.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $city = City::find($id);
            $city->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('City not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.city.index');
        }
        DB::commit();
        Toastr::success(trans('City Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.city.index');
    }
}
