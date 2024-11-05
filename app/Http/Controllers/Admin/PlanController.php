<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public  function index()
    {
        $data['title'] = __('messages.common.plan');
        $data['plan'] = Plan::get();
        return view('admin.plan.index', $data);
    }
    public  function create()
    {
        $data['title'] = __('messages.plan.create_plan');
        $data['currency'] = Currency::get();
        return view('admin.plan.create', $data);
    }

    public  function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_de' => 'required',
            'no_of_vcards' => 'required',
            'currency_id' => 'required',
            'price' => 'required',
            'frequency' => 'required',
            'day' => 'required',
            'bg_color' => 'required',
            'feature_name_de.*' => 'required_with:feature_name.*',
        ], [
            'feature_name_de.*.required_with' => 'If you filled the Feature Name in English, you must also fill the Feature Name in German.',
        ]);
        DB::beginTransaction();
        try {
            $plan                   = new Plan();
            $plan->name             = $request->name;
            $plan->name_de          = $request->name_de;
            $plan->no_of_vcards     = $request->no_of_vcards;
            $plan->currency_id      = $request->currency_id;
            $plan->currency         = getCurrencySymbol($request->currency_id);
            $plan->price            = $request->price;
            $plan->status           = $request->status ?? 1;
            $plan->frequency        = $request->frequency;
            $plan->day              = $request->day;
            $plan->bg_color         = $request->bg_color;
            $plan->digital_wallet   = $request->digital_wallet ?? 0;
            $plan->self_branding    = $request->self_branding ?? 0;
            $plan->analytics        = $request->analytics ?? 1;
            $plan->order_number     = $request->order_number ?? plan::max('order_number') + 1;
            $plan->save();

            if ($request->has('feature_name') || $request->has('feature_name_de')) {
                $featureNames = $request->input('feature_name');
                $featureNamesDe = $request->input('feature_name_de', []);

                foreach ($featureNames as $index => $featureName) {
                    $feature = new PlanFeature();
                    $feature->plan_id = $plan->id;
                    $feature->feature_name = $featureName;
                    $feature->feature_name_de = $featureNamesDe[$index] ?? null;
                    $feature->save();
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.plan_create_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return back();
        }
        DB::commit();
        Toastr::success(__('messages.toastr.plan_create_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.plan.index');
    }

    public  function edit($id)
    {
        $data['title'] = __('messages.plan.edit_plan');
        $data['row'] = Plan::find($id);
        $data['features'] = PlanFeature::where('plan_id', $id)->get();
        $data['currency'] = Currency::get();
        return view('admin.plan.edit', $data);
    }

    public  function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_de' => 'required',
            'no_of_vcards' => 'required',
            'currency_id' => 'required',
            'price' => 'required',
            'frequency' => 'required',
            'day' => 'required',
            'bg_color' => 'required',
            'feature_name_de.*' => 'required_with:feature_name.*',
        ], [
            'feature_name_de.*.required_with' => 'If you filled the Feature Name in English, you must also fill the Feature Name in German.',
        ]);

        DB::beginTransaction();
        try {
            $plan                     = Plan::find($id);
            $plan->name               = $request->name;
            $plan->name_de            = $request->name_de;
            $plan->no_of_vcards       = $request->no_of_vcards;
            $plan->currency_id        = $request->currency_id;
            if (isset($request->currency_id) && !empty($request->currency_id)) {
                $plan->currency       = getCurrencySymbol($request->currency_id);
            }
            $plan->price              = $request->price;
            $plan->frequency          = $request->frequency;
            $plan->day                = $request->day;
            $plan->status             = $request->status;
            $plan->bg_color           = $request->bg_color;
            // $plan->digital_wallet  = $request->digital_wallet;
            $plan->self_branding      = $request->self_branding;
            $plan->analytics          = $plan->analytics ?? 1;
            $plan->order_number       = $request->order_number;

            $plan->save();

            PlanFeature::where('plan_id', $id)->delete();

            if ($request->has('feature_name') || $request->has('feature_name_de')) {
                $featureNames = $request->input('feature_name');
                $featureNamesDe = $request->input('feature_name_de', []);

                foreach ($featureNames as $index => $featureName) {
                    $feature = new PlanFeature();
                    $feature->plan_id = $plan->id;
                    $feature->feature_name = $featureName;
                    $feature->feature_name_de = $featureNamesDe[$index] ?? null;
                    $feature->save();
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.plan_update_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return back();
        }
        DB::commit();
        Toastr::success(__('messages.toastr.plan_update_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.plan.index');
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {

            // Check if any user is using this plan
            $usersUsingPlan = User::where('current_pan_id', $id)->exists();
            // dd($usersUsingPlan);

            if ($usersUsingPlan) {
                // If any user is using the plan, abort the deletion
                DB::rollback();
                Toastr::error(__('messages.toastr.plan_delete_warning'), 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.plan.index');
            }

            $plan = Plan::find($id);
            $plan->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.plan_delete_error'), 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.plan.index');
        }
        DB::commit();
        Toastr::success(__('messages.toastr.plan_delete_success'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.plan.index');
    }
}
