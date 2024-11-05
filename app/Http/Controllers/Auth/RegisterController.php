<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Mail\WellcomeMail;
use App\Models\User;
use App\Models\Plan;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::CARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'phone' => ['required'],
            // 'address' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // 'user_code',
        // 'name',
        // 'username',
        // 'email',
        // 'password',
        // 'phone',
        // 'address',
        // 'image',
        // 'current_pan_id',
        // 'current_pan_name',
        // 'current_pan_valid_date',

        //unique username
        $username = rand();
        $max_code = User::max('user_code');
        if($max_code){
            $user_code = $max_code+1;
        }
        $user_code = 1001;

        //need to check any default plan
        // without default plan not possible registration
        $paln = Plan::where('is_default','1')->first();
        if($paln == ''){
            return false;
        }

        $current_pan_id = $paln->id;
        $current_pan_name = $paln->name;
        $day = $paln->day;
        $current_pan_valid_date = Carbon::now()->addDays((int)$day);

        try{
            Mail::to($data['email'])->send(new WellcomeMail($data));
        }catch(Exception $e){

        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'phone' => $data['phone'],
            // 'address' => $data['address'],
            'current_pan_id' => $current_pan_id,
            'current_pan_name' => $current_pan_name,
            'current_pan_valid_date' => $current_pan_valid_date,
            'username' => $username,
            'user_code' => $user_code,
            'password' => bcrypt($data['password']),
        ]);



    }
}
