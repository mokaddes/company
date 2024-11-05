<?php


namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{

    protected $country;
    public $user;

    public function __construct(Country $country)
    {
        $this->country     = $country;
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
        if (is_null($this->user) || !$this->user->can('admin.country.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Country';
        $data['rows'] = Country::oldest('name')->get();
        return view('admin.country.index', compact('data'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.country.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $this->validate($request, [
            'name'          => 'required|unique:countries,name|max:100',
            'code'          => 'required|max:10',
        ]);

        DB::beginTransaction();
        try {

            $country = new Country();
            $country->name         = $request->name;
            $country->code         = $request->code;
            $country->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(trans('Country not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.country.index');
        }
        DB::commit();
        Toastr::success(trans('Country Added Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.country.index');
    }

    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.country.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $country = Country::find($id);
        $html = view('admin.country.edit', compact('country'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.country.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $this->validate($request, [
            'name'   => 'max:100|unique:countries,name,'.$id,
            'code'   => 'required|max:10',
        ]);

        DB::beginTransaction();
        try {

            $country = Country::find($id);
            $country->name         = $request->name;
            $country->code         = $request->code;
            $country->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(trans('Country not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.country.index');
        }
        DB::commit();
        Toastr::success(trans('Country Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.country.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.country.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $country = Country::find($id);
            $country->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Country not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.country.index');
        }
        DB::commit();
        Toastr::success(trans('Country Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.country.index');
    }
}
