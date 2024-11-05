<?php


namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Plan;
use App\Models\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{

    protected $customer;
    public $user;

    public function __construct(User $customer)
    {
        $this->customer     = $customer;
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
        if (is_null($this->user) || !$this->user->can('admin.customer.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = __('messages.common.user_list');
        $data['rows'] = User::with('userPlan', 'card')->orderby('id', 'desc')->get();
        // dd(($data['rows']) );
        return view('admin.customer.index', compact('data'));
    }

    public function getPlan($id)
    {
        $data['user']= User::find($id);
        $data['plans'] = Plan::get();
        $html = view('admin.customer.plan_form', compact('data'))->render();
        return response()->json($html);
    }
    public function changePlan(Request $request)
    {
        
        DB::beginTransaction();
        try {
            

            
            $user = User::where('id', $request->user_id)->first();
            $plan = Plan::find($request->plan_id);
            $new_plan_card = $plan->no_of_vcards;
            $userPlan = $user->current_pan_id;
            $userPlanCard = Plan::find($userPlan);

            // $transaction = new Transaction();
            // $transaction->transaction_number = uniqid('trx_');
            // $transaction->user_id = auth()->id();
            // $transaction->plan_id = $plan->id;
            // $transaction->amount = $plan->price;
            // $transaction->currency = 'Euro';
            // $transaction->status = '1';
            // $transaction->pay_date = now();
            // $transaction->transaction_id = $this->generateCustomUniqueId();
            // $transaction->payment_method = 'PayPal';
            // $transaction->save();

            $current_plan_card = $userPlanCard->no_of_vcards;
            if ($current_plan_card > $new_plan_card) {
    
                // $card_difference = $current_plan_card_no - $new_plan_card;
                $activeCards = Card::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    
                // Determine how many cards need to be deactivated
                $activeCardCount = $activeCards->count();
                $cardsToDeactivateCount = $activeCardCount - $new_plan_card;
    
                if ($cardsToDeactivateCount > 0) {
                    // We need to deactivate the oldest excess cards
                    $cardsToDeactivate = $activeCards->take($cardsToDeactivateCount);
    
                    foreach ($cardsToDeactivate as $card) {
                        $card->status = 2; // Set status to inactive
                        $card->save();
                    }
                }
            }
    
            $user->current_pan_id = $plan->id;
            $user->current_pan_name = $plan->name;
            $user->current_pan_valid_date = Carbon::now()->addDay($plan->day);
            $user->update();

        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.plan_change_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(__('messages.toastr.plan_change_message'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }
    public function create(){
        if (is_null($this->user) || !$this->user->can('admin.customer.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $data['title'] = __('messages.common.user');
        $data['roles'] = Role::orderBy('name', 'asc')->get();
        return view('admin.customer.create', compact('data'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $this->validate($request, [
            'name'          => 'required|max:100',
            'email'         => 'required|unique:users,email,except,id',
            'password'      => 'required|min:6',
            'phone'         => 'required|unique:users,phone',
            'address'       => 'nullable',
            'image'         => 'nullable',
            'status'        => 'required',
        ]);

        $imageName = null;
        DB::beginTransaction();
        try {

            $max_code = User::max('user_code');
            $user_code = $max_code ? $max_code + 1 : 1001;
            $paln = Plan::where('is_default','1')->first();
            if($paln == ''){
                return false;
            }
            $day = $paln->day;
            $currentDate = Carbon::now()->addDays($day);

            $customer = new User();
            $customer->name          = $request->name;
            $customer->email         = $request->email;
            $customer->password      = Hash::make($request->password);
            $customer->phone         = $request->phone;
            $customer->image         = $imageName;
            $customer->address       = $request->address;
            $customer->status        = $request->status;
            $customer->user_code     = $user_code;
            $customer->username       = rand();
            $customer->current_pan_id = $paln->id;
            $customer->current_pan_name = $paln->name;
            $customer->current_pan_valid_date = $currentDate->format('Y-m-d');


            if ($request->hasFile('image')) {

                // Upload and save the new image
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'uploads/UserInfo';
                $image->move(public_path($file_path), $image_name);
                $customer->image  = $file_path . '/' . $image_name;

            }
            $customer->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(__('messages.toastr.create_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(__('messages.toastr.user_created'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }

    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.customer.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $data['title'] = __('messages.crud.user_edit');
        $data['user'] = User::find($id);
        $data['role'] = Role::orderBy('name', 'asc')->get();
        return view('admin.customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $customer = User::find($id);
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'           => 'required|max:100',
                'email'         => 'required|unique:users,email,'. $customer->id,
                'phone'          => 'required',
                'address'       => 'nullable',
                'image'         => 'nullable',
                'status'        => 'required',
            ]);

            $customer->name          = $request->name;
            $customer->email         = $request->email;
            $customer->phone         = $request->phone;
            $customer->address       = $request->address;
            $customer->status        = $request->status;

            if ($request->hasFile('image')) {

                // Delete the existing image file if it exists
                if (File::exists(public_path($customer->image))) {
                    File::delete(public_path($customer->image));
                }

                // Upload and save the new image
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'uploads/UserInfo';
                $image->move(public_path($file_path), $image_name);
                $customer->image  = $file_path . '/' . $image_name;

            }
            $customer->save();

        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.update_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(__('messages.toastr.customer_upate'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }

    public function updatePassword(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $user = User::find($request->user_id);
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'password'   => 'required|min:6',
            ]);
            $user->password         = Hash::make($request->password);
            $user->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(__('messages.toastr.password_change_error'), 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        DB::commit();
        Toastr::success(__('messages.toastr.password_change_mesage'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $customer = User::find($id);
            $cards = $customer->card;

            if ($cards->isNotEmpty()) {
                foreach ($cards as $card) {
                    if (File::exists($card->profile_image)) {
                        File::delete($card->profile_image);
                    }
                    if (File::exists($card->cover_image)) {
                        File::delete($card->cover_image);
                    }
                    $card->icons->delete();

                    foreach ($card->analytics as $analytic) {
                        $analytic->delete();
                    }

                    foreach ($card->enquiries as $enquiry) {
                        $enquiry->delete();
                    }

                    $card->delete();
                }
            }

            if (File::exists('assets/images/customer/' . $customer->image)) {
                File::delete('assets/images/customer/' . $customer->image);
            }

            foreach ($customer->transactions as $transaction) {
                $transaction->delete();
            }

            $customer->delete();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error(__('messages.toastr.user_delete_error'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(__('messages.toastr.user_delete_success'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }

    public function view($id){
        if (is_null($this->user) ||!$this->user->can('admin.customer.edit')) {
            abort(403, 'Sorry!! You are Unauthorized.');
        }
        $data['title'] =  __('messages.crud.customer_view');
        $data['user'] = User::with('userPlan', 'card')->find($id);
        $data['cards'] = Card::where('user_id', $id)->withCount('analytics')->orderBy('id', 'desc')->get();
        return view('admin.customer.view', compact('data'));
    }

    function generateCustomUniqueId($length = 16) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $uniqueId = '';
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $uniqueId .= $characters[$index];
        }
        return $uniqueId;
    }

}
