<?php

namespace App\Http\Controllers;

use App\Mail\PlanPurchaseFailedMail;
use App\Mail\PlanPurchaseMail;
use App\Mail\SendContact;
use App\Models\Card;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    public function __construct()
    {
        $config = DB::table('config')->where('config_key', 'like', '%paypal%')->get();
        $mode = $config[0]->config_value;
        $paypal_client_id = $config[1]->config_value;
        $paypal_secret = $config[2]->config_value;
        config()->set('paypal.mode', $mode);
        if ($mode == 'sandbox') {
            config()->set('paypal.sandbox.client_id', $paypal_client_id);
            config()->set('paypal.sandbox.client_secret', $paypal_secret);
        } else {
            config()->set('paypal.live.client_id', $paypal_client_id);
            config()->set('paypal.live.client_secret', $paypal_secret);
        }
    }


    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {

 
        $plan = Plan::find($request->planId);
        $userPlan = auth()->user()->current_pan_id;
        // dd($userPlan);
        $userPlanCard = Plan::find($userPlan);
        $current_plan_card = $userPlanCard->no_of_vcards;


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.successTransaction', [
                    // 'number' => $transaction->transaction_number,
                    'plan_id' => $plan->id,
                ]),
                "cancel_url" => route('user.cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => 'EUR',
                        "value" => $plan->price,
                    ]
                ]
            ]
        ]);
        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {

            session([
                'plan_id' => $plan->id,
                'plan_price' => $plan->price,
                'plan_name' => $plan->name,
                'plan_day' => $plan->day,
                'no_of_card' => $plan->no_of_vcards,
                'user_current_plan_card' => $current_plan_card
            ]);

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            Toastr::error(trans($response['message'] ?? 'Something went wrong.'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back()
            ->with('error', 'Something went wrong.');
        } else {
            Toastr::error(trans($response['message'] ?? 'Something went wrong.'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back()
            ->with('error', $response['message'] ?? 'Something went wrong.');
        }

     
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        // dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $plan_id = session('plan_id');
            $plan_price = session('plan_price');
            $plan_name = session('plan_name');
            $plan_day = session('plan_day');
            $new_plan_card = session('no_of_card');
            $current_plan_card_no = session('user_current_plan_card');

            $transaction = new Transaction;
            $transaction->transaction_number = uniqid('trx_');
            $transaction->user_id = auth()->id();
            $transaction->plan_id = $plan_id;
            $transaction->amount = $plan_price;
            $transaction->currency = 'Euro';
            $transaction->status = '1';
            $transaction->pay_date = now();
            $transaction->transaction_id = $response['id'];
            $transaction->payment_method = 'PayPal';
            $transaction->save();


            $user = User::where('id', $transaction->user_id)->first();
            // $userPlan = Plan::find($user->current_pan_id);
            // $current_plan_card = $userPlan->no_of_vcards;

            if ($current_plan_card_no > $new_plan_card) {

                // $card_difference = $current_plan_card_no - $new_plan_card;
                $activeCards = Card::where('user_id', auth()->id())
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

            // dd($userPlan, $user,$user->current_pan_id);
            // $today = \Carbon\Carbon::today();
            // $validDate = \Carbon\Carbon::parse($user->current_pan_valid_date);
            // $sumDay = $today->diffInDays($validDate, false);

            // if($userPlan->is_default == '1'){
            //     $sumDay = (int) $plan_day;
            // }else{
            //     $sumDay = (int) $plan_day + (int) $existingDay;
            // }

            $user->current_pan_id = $plan_id;
            $user->current_pan_name = $plan_name;
            $user->current_pan_valid_date = Carbon::now()->addDay($plan_day);
            $user->update();


            // $mailData = [
            //     'title' => 'Your Purchase Receipt and Details',
            //     'data' => [
            //         'plan_name' => $plan_name,
            //         'plan_day' => $plan_day,
            //         'plan_price' => $plan_price,
            //         'details' => route('invoice.download', $transaction->id),
            //     ]
            // ];
            
            // Mail::to($user->email)->send(new PlanPurchaseMail($mailData));

            // Send Contact Mail
            $data = [];
            $data = [
                'greeting'    => 'Hello, Admin,',
                'body'        => 'A user has purchased a new plan (' . $plan_name . ') from your system.',
                'name'        => 'User name- '.$user->name,
                'email'       => 'User email- '.$user->email,
                'link'        => route('admin.transaction.index'),
                'msg'         => 'Click here to navigate to the transaction',
                'thanks'      => 'Thank you and stay with ' . ' ' . config('app.name'),
                'site_url'    => route('home'),
                'footer'      => '0',
                'site_name'   => config('app.name'),
                'copyright'   => ' © ' . ' ' . Carbon::now()->format('Y') .' '. config('app.name') . ' ' . 'All rights reserved.',
            ];

            $setting =  Setting::first();
            //if mail exist
            $support_email = $setting->email ?? $setting->support_email;
            if ($support_email) {
                Mail::to($support_email)->send(new SendContact($data));
            }

            Toastr::success(__('messages.toastr.plan_upgrade_success'), trans('Success'), ["positionClass" => "toast-top-right"]);

            session()->forget(['plan_id', 'plan_price', 'plan_name', 'plan_day', 'user_current_plan_card', 'no_of_card']);
            return redirect()
                ->route('user.profile');
            // ->with('success', 'Transaction complete.');
        } else {
            Toastr::error(trans($response['message'] ?? __('messages.toastr.plan_upgrade_error')), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()
                ->route('user.cancelTransaction');
            // ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {

        $plan_name = session('plan_name');
        $user = auth()->user();
        $mailData = [
            'title' => 'Plan Purchase Failed',
            'data' => [
                'plan_name' => $plan_name,
                'user_name' => $user->name,
                'details' => route('frontend.contact'),
            ]
        ];

        Mail::to($user->email)->send(new PlanPurchaseFailedMail($mailData));

        session()->forget(['plan_id', 'plan_price', 'plan_name', 'plan_day', 'user_current_plan_card', 'no_of_card']);

        Toastr::error(trans($response['message'] ?? 'Something went wrong.'), trans('Error'), ["positionClass" => "toast-top-right"]);
        return redirect()
            ->route('user.upgrade.plan');
        // ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
