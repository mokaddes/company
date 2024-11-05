<?php

namespace App\Http\Controllers;

use App\Mail\SendContact;
use App\Models\Faq;
use App\Models\User;
use App\Models\Card;
use App\Models\Contact;
use App\Models\CustomPage;
use App\Models\HomeContent;
use App\Models\Language;
use App\Models\Plan;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\SocialIcon;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function changeLanguage(Request $request): RedirectResponse
    {

        Session::put('languageName', $request->input('languageName'));
        $language = Language::where('iso_code', $request->input('languageName'))->first();
        Session::put('language', $language);
        return redirect()->back();
    }
    public function changeCardLanguage(Request $request)
    {

        Session::put('cardLang', $request->input('locale'));
        return redirect()->back();
    }

    public function index()
    {
        $setting = getSetting();
        $data['title']          = $setting->site_name;
        $data['og_title']       = $setting->site_name;
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['faqs']           = Faq::where('is_active', 1)->orderBy('order_id','asc')->get();
        $data['seo']            = Seo::where('page_slug', 'home')->first();
        $data['homeContent']    = HomeContent::first();
        $data['plans']          = Plan::where('status', '1')->get();
        $data['testimonials']    = Testimonial::where('status', '1')->orderBy('order_id')->get();
        return view('frontend.index', $data);
    }

    public function privacyPolicy()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.privacy_policy');
        $data['og_title']       = 'Privacy Policy | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'privacy-policy')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }

    public function termsCondition()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.terms_conditions');
        $data['og_title']       = 'Terms & Condition | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'terms-and-conditions')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }

    public function imprint()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.imprint');
        $data['og_title']       = 'Imprint | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'imprint')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }
    public function rightOfWithdrawal()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.right-of-withdrawal');
        $data['og_title']       = 'Right of Withdrawal | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'right-of-withdrawal')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }
    public function generalTermsConditions()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.general-terms-and-conditions');
        $data['og_title']       = 'General Terms & Conditions | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'general-terms-and-conditions')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }

    public function faq()
    {
        $setting = getSetting();
        $data['title']          = 'FAQ';
        $data['og_title']       = 'FAQ | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['faqs']           = Faq::where('is_active', 1)->orderBy('order_id','asc')->get();
        $data['seo']            = Seo::where('page_slug', 'faq')->first();
        return view('frontend.faq', $data);
    }
    public function dataProtectionDeclaration()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.data-protection-declaration');
        $data['og_title']       = 'Data Protection Declaration | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'data-protection-declaration')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }
    public function shippingConditions()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.shipping-conditions');
        $data['og_title']       = 'Shipping Conditions | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'shipping-conditions')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }

    public function returns()
    {
        $setting = getSetting();
        $data['title']          = __('messages.footer.returns');
        $data['og_title']       = 'Returns | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'returns')->where('is_active', 1)->firstOrFail();
        return view('frontend.custom_page', $data);
    }
    public function about()
    {
        $setting = getSetting();
        $data['title']          = __('messages.nav.about');
        $data['og_title']       = 'About-Us | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['row']            = CustomPage::where('url_slug', 'about-us')->where('is_active', 1)->firstOrFail();
        return view('frontend.about', $data);
    }

    public function pricing()
    {
        $setting = getSetting();
        $data['title']          = 'Pricing';
        $data['og_title']       = 'Pricing | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['seo']            = Seo::where('page_slug', 'pricing')->first();
        $data['plans']          = Plan::where('status', '1')->get();
        $data['homeContent']    = HomeContent::first();
        return view('frontend.pricing', $data);
    }

    public function contact()
    {
        $setting = getSetting();
        $data['title']          = 'Contact';
        $data['og_title']       = 'Contact | Venmeo.de';
        $data['og_description'] = $setting->seo_meta_description;
        $data['og_image']       = $setting->site_logo;
        $data['meta_keywords']  = $setting->seo_keywords;
        $data['setting']        = $setting;
        $data['seo']            = Seo::where('page_slug', 'contact')->first();
        return view('frontend.contact', $data);
    }

    public function contactSub(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:100|string',
            'last_name'  => 'required|max:100|string',
            'email'      => 'required|max:80|string',
            'message'    => 'required|max:512|string'
        ]);

        DB::beginTransaction();
        try {
            $contact = new Contact();
            $contact->name      = $request->first_name.' '.$request->last_name;
            $contact->email     = $request->email;
            $contact->reason    = 0;
            $contact->message   = $request->message;
            $contact->save();

            // Send Contact Mail
            $data = [];
            $data = [
                'greeting'    => 'Hello, Admin,',
                'body'        => 'An user send a contact message to your system. Please review and respond to the users query as soon as possible.',
                'name'        => 'User name- '.$request->first_name.' '.$request->last_name,
                'email'       => 'User email- '.$request->email,
                'link'        => route('admin.contact.index'),
                'msg'         => 'Click here to navigate to the query',
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
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error(trans('An unexpected error occured while submit your query'), 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        DB::commit();
        Toastr::success(trans('Your query is submitted'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function userRegister(Request $request)
    {
        $setting = getSetting();

        $request->validate([
            'name'      => "required",
            'email'     => "required|email|unique:users,email",
            'password'  => "required|confirmed|min:8|max:50",
        ]);

        $created = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        if ($created) {
            Auth::guard('user')->logout();
            Auth::guard('admin')->logout();
            Auth::guard('user')->login($created);
            if ($setting->customer_email_verification) {
                return redirect()->route('verification.notice');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
    }

    public function testEmail()
    {
        $message = [
            'msg' => 'Test mail'
        ];
        $mail = false;
        try {
            Mail::to(ENV('MAIL_FROM_ADDRESS'))->send(new \App\Mail\TestMail($message));
            $mail = true;
        } catch (\Exception $e) {
            dd($e);
            Toastr::success(trans('Email configuration wrong.'), 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        if ($mail == true) {

            Toastr::success(trans('Test mail send successfully.'), 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function getPreview(Request $request, $cardurl)
    {

        $card = Card::where('url_alias', $cardurl)->first();


        if (!isset($card) && !empty($card))
        {
            abort(404);
        }

        //  check plan validity, if expired then redirect to home page
        $planValidity = User::where('id', $card->user_id)->first('current_pan_valid_date')->current_pan_valid_date;
        $currentDay = Carbon::today();

        if($currentDay->greaterThan($planValidity)){
            {
                abort(404);
            }
        }

        if (!empty($card)) {
            $icons = SocialIcon::where('vcard_id', $card->id)->first();

            if ($card->status == "0") {
                // if ($request->headers->get('referer')) {
                //     Toastr::warning('This card has been de-activated, please contact with Linksmartt');
                //     return redirect()->back();
                // } else {
                    abort(404);
                // }
                // return redirect()->back();
            }
            if ($card->status == "2") {
                // if ($request->headers->get('referer')) {
                //     Toastr::warning('This card has been deleted');
                //     return redirect()->back();
                // } else {
                    abort(404);
                // }

            }
            // DB::table('business_cards')->where('id', $card->id)->increment('total_view', 1);
            // $inserted_id = self::insertHistory($card, "history_card_browsing");

            return view('user.card.preview.template' . $card->template_id, compact('card', 'icons'));
        }
    }

}
