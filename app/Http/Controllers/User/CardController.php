<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Inquiry;
use App\Models\SocialIcon;
use App\Mail\VcardContact;
use App\Models\CardAnalytic;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CardController extends Controller
{
    public function index()
    {
        $title = __('messages.common.cards');
        $cards = Card::where('user_id', auth()->user()->id)->get();
        $activeCardCount = Card::where('user_id', auth()->user()->id)
        ->where('status', 1) // Adjust this if your 'active' status is different
        ->count();
        return view('user.card.index', compact('title', 'cards', 'activeCardCount'));
    }

    public function preview()
    {
        $title = __('messages.common.cards');
        return view('user.card.preview', compact('title'));
    }

    public function theme()
    {
        if(checkPlanValidity()) {
            $makeVcard = checkTotalVcard();
            if (!$makeVcard) {
                Toastr::warning((__('messages.toastr.card_limit_warning')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
                return redirect(route('user.card.index'));
            }
        } else {
            Toastr::warning((__('messages.toastr.please_upgrade_plan')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
            return redirect(route('user.card.index'));
        }


        $title = __('messages.card.themes');
        return view('user.card.theme', compact('title'));
    }


    public function create()
    {
        if(checkPlanValidity()) {
            $makeVcard = checkTotalVcard();
            if (!$makeVcard) {
                Toastr::warning((__('messages.toastr.card_limit_warning')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
                return redirect(route('user.card.index'));
            }
        } else {
            Toastr::warning((__('messages.toastr.please_upgrade_plan')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        $title = __('messages.common.create_card');
        return view('user.card.create', compact('title'));
    }

    public function edit($id)
    {
        if(!checkPlanValidity()) {
            Toastr::warning((__('messages.toastr.please_upgrade_plan')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
            return redirect(route('user.card.index'));
        }

        $title = __('messages.common.edit_card');
        $card = Card::with('icons')->findOrFail($id);
        return view('user.card.edit', compact('title','card'));
    }

    public function status($id)
    {
        try {

            DB::beginTransaction();

            $card = Card::find($id);
            $card->status = $card->status == 1 ? 0 : 1;
            $card->save();
            if ($card->status == '1') {
                Toastr::success(__('messages.toastr.card_status_active'));
            } else {
                Toastr::error(__('messages.toastr.card_status_inactive'));
            }
        } catch (Exception $ex) {
            DB::rollback();

            Toastr::error(__('messages.toastr.card_status_error'));

        }
        DB::commit();
        return redirect()->back();

    }


    public function analytics()
    {
        // if(checkPlanValidity()) {
        //     $permission = checkPlanFeature('analytics');
        //     if (!$permission) {
        //         Toastr::warning((__('messages.toastr.analytics_privilege')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
        //         return redirect()->back();
        //     }
        // } else {
        //     Toastr::warning((__('messages.toastr.please_upgrade_plan')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
        //     return redirect(route('user.card.index'));
        // }

        $user = auth()->user();
        $title = __('messages.common.analytics');
        $cards = Card::where('user_id', $user->id);
        $vcardIds = $cards->pluck('id')->toArray();
        $totalView = $cards->sum('total_view');
        $totalSavedContact = $cards->sum('total_contact_saved');
        $totalCards = $cards->count();
        $totalConnection = Inquiry::with('vcard')->whereIn('vcard_id', $vcardIds)->count();

        $data = $this->getAnalyticsData($vcardIds);

        return view('user.card.analytics', compact('title', 'totalCards', 'totalConnection', 'totalView', 'totalSavedContact', 'data'));
    }

    private function getAnalyticsData($vcardIds)
    {
        $analytics = CardAnalytic::whereIn('vcard_id', $vcardIds)->get();
        $data = [];

        if ($analytics->count() > 0) {
            $DataCount = $analytics->count();
            $percentage = 100 / $DataCount;

            $data['browser'] = $this->processAnalyticsGroup($analytics->groupBy('browser'), $percentage);
            $data['device'] = $this->processAnalyticsGroup($analytics->groupBy('device'), $percentage);

            $country = $analytics->groupBy('country');
            $country_record = $this->processAnalyticsGroup($country, $percentage);

            // Filter out empty keys
            $filtered_country_data = array_filter($country_record, function ($key) {
                return !empty($key);
            }, ARRAY_FILTER_USE_KEY);

            $data['country'] = collect($filtered_country_data)->sortBy('count')->reverse()->toArray();

            $data['operating_system'] = $this->processAnalyticsGroup($analytics->groupBy('operating_system'), $percentage);
            $data['language'] = $this->processAnalyticsGroup($analytics->groupBy('language'), $percentage);
        }

        return $data;
    }

    private function processAnalyticsGroup($group, $percentage)
    {
        $record = [];
        foreach ($group as $key => $item) {
            $record[$key]['count'] = $item->count();
            $record[$key]['per'] = $item->count() * $percentage;
        }

        return collect($record)->sortBy('count')->reverse()->toArray();
    }

    public function store(Request $request)
    {

        if(checkPlanValidity()) {
            $makeVcard = checkTotalVcard();
            if (!$makeVcard) {
                Toastr::warning((__('messages.toastr.card_limit_warning')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
                return redirect(route('user.card.index'));
            }
        } else {
            Toastr::warning((__('messages.toastr.please_upgrade_plan')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
            return redirect(route('user.card.index'));
        }

        $user_id = Auth::user()->id;

        $this->validate($request, [
            'cover_image' => 'required',
            'profile_image' => 'required',
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:60',
            'address' => 'required|string|max:256',
            'company_name' => 'required|string|max:60',
            'designation' => 'required|string|max:60',
            'url_alias' => 'required|string|max:60|unique:vcards,url_alias',
            'self_branding' => 'nullable|string|max:50',
        ]);

        DB::beginTransaction();
        try {

            $card    = new Card();
            $card->user_id      = $user_id;
            $card->url_alias    = $request->url_alias;
            $card->default_language_code  = geDefaultLanguage()->iso_code;
            $card->template_id  = $request->template_id;
            $card->status       = 1;
            $card->first_name   = $request->first_name;
            $card->last_name    = $request->last_name;
            $card->phone        = $request->phone;
            if($request->has('phone_2')) {
                $card->phone_2     = $request->phone_2;
            }
            $card->email        = $request->email;
            $card->location     = $request->address;
            $card->company      = $request->company_name;
            $card->job_title    = $request->designation;
            $card->paypal_account   = $request->paypal;
            $card->self_branding    = $request->self_branding;

            if ($request->has('profile_image_path')) {
                $card->profile_image  = $request->profile_image_path;
            }

            if ($request->has('cover_image_path')) {
                $card->cover_image  = $request->cover_image_path;
            }

            $card->save();

            $social_icon   = new SocialIcon();
            $social_icon->vcard_id  = $card->id;
            $social_icon->facebook  = $request->facebook;
            $social_icon->twitter   = $request->twitter;
            $social_icon->linkedin  = $request->linkedin;
            $social_icon->whatsapp  = $request->whatsapp;
            $social_icon->pinterest = $request->pinterest;
            $social_icon->instagram = $request->instagram;
            $social_icon->twitch    = $request->twitch;
            $social_icon->xing      = $request->xing;
            $social_icon->telegram  = $request->telegram;
            $social_icon->website   = $request->website;
            $social_icon->website_2 = $request->website_2;
            $social_icon->calendly	= $request->calendly;
            $social_icon->spotify   = $request->spotify;
            $social_icon->save();

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Toastr::error((__('messages.toastr.card_update_error')), __('messages.common.error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        DB::commit();
        Toastr::success((__('messages.toastr.card_update_success')), __('messages.common.success'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.card.index');
    }

    public function update($id, Request $request)
    {

        if(!checkPlanValidity()) {
            Toastr::warning((__('messages.toastr.please_upgrade_plan')), __('messages.toastr.warning'), ["positionClass" => "toast-top-right"]);
            return redirect(route('user.card.index'));
        }

        $this->validate($request, [
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:60',
            'address' => 'required|string|max:256',
            'company_name' => 'required|string|max:60',
            'designation' => 'required|string|max:60',
            'self_branding' => 'nullable|string|max:50',
            'url_alias' => 'required|string|max:60|unique:vcards,url_alias,' . $id . ',id',
        ]);

        DB::beginTransaction();
        try {

            $card    = Card::find($id);
            $card->template_id  = $request->theme_id;
            $card->url_alias    = $request->url_alias;
            // $card->status       = 1;
            $card->first_name   = $request->first_name;
            $card->last_name    = $request->last_name;
            $card->phone        = $request->phone;
            if($request->has('phone_2')) {
                $card->phone_2     = $request->phone_2;
            }
            $card->email        = $request->email;
            $card->location     = $request->address;
            $card->company      = $request->company_name;
            $card->job_title    = $request->designation;
            $card->paypal_account   = $request->paypal;
            $card->self_branding    = $request->self_branding;

            if ($request->has('profile_image_path') && ($card->profile_image  !== $request->profile_image_path)) {

                if (File::exists($card->profile_image)) {
                    File::delete($card->profile_image);
                }

                $card->profile_image  = $request->profile_image_path;
            }

            if ($request->has('cover_image_path') && ($card->cover_image !== $request->cover_image_path)) {

                if (File::exists($card->cover_image)) {
                    File::delete($card->cover_image);
                }

                $card->cover_image  = $request->cover_image_path;
            }

            $card->save();

            SocialIcon::where('vcard_id',$id)->first()->delete();

            $social_icon   = new SocialIcon();
            $social_icon->vcard_id  = $card->id;
            $social_icon->facebook  = $request->facebook;
            $social_icon->twitter   = $request->twitter;
            $social_icon->linkedin  = $request->linkedin;
            $social_icon->whatsapp  = $request->whatsapp;
            $social_icon->pinterest = $request->pinterest;
            $social_icon->instagram = $request->instagram;
            $social_icon->twitch    = $request->twitch;
            $social_icon->xing      = $request->xing;
            $social_icon->telegram  = $request->telegram;
            $social_icon->website   = $request->website;
            $social_icon->website_2 = $request->website_2;
            $social_icon->calendly	= $request->calendly;
            $social_icon->spotify   = $request->spotify;
            $social_icon->save();

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Toastr::error((__('messages.toastr.card_updated_error')), __('messages.common.error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        DB::commit();
        Toastr::success((__('messages.toastr.card_updated_success')), __('messages.common.success'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.card.index');
    }

    public function previewTemplate(Request $request)
    {
        $templateId = $request->get('template_id');
        $cardId = $request->get('card_id');

        $card = Card::find($cardId);

        if ($templateId == '1') {
            return view('user.card.template.template1', compact('card'))->render();
        } elseif ($templateId == '2') {
            return view('user.card.template.template2', compact('card'))->render();
        }

        return response()->json(['error' => 'Invalid template ID'], 400);
    }

    public function getDelete($id)
    {

        DB::beginTransaction();
        try {
            $card = Card::findOrFail($id);

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
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Toastr::error((__('messages.toastr.card_delete_error')), __('messages.common.error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        DB::commit();
        Toastr::success((__('messages.toastr.card_delete')), __('messages.common.success'), ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    public function uploadImage(Request $request)
    {
        // Upload and save the profile image
        $data = $request->image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        Image::make($data)->save('uploads/vcard/' . $imageName);
        $path = asset('uploads/vcard/' . $imageName);
        $path2 = 'uploads/vcard/' . $imageName;
        return response()->json([
            'path' => '<img src="' . $path . '"width="120" class="rounded-pill img-fluid preview_profile" alt="Profile Image"/>',
            'input' => $path2,
        ]);
    }

    public function uploadCover(Request $request)
    {
        // Upload and save the cover image
        $data = $request->image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        Image::make($data)->save('uploads/vcard/' . $imageName);
        $path = asset('uploads/vcard/' . $imageName);
        $path2 = 'uploads/vcard/' . $imageName;
        return response()->json([
            'path' => $path,
            'input' => $path2,
        ]);
    }

    public function contactSubmit(Request $request)
    {

        $vcard = Card::where('id', $request->vcard_id)->first();

        if(Auth::check())
        {
            if($vcard->user_id == Auth::user()->id)
            {
                Toastr::error((__('messages.toastr.cannot_submit_own_query')), __('messages.common.error'), ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        }

        $this->validate($request, [

            'name' => 'required|string|max:128',
            'email' => 'required|string|max:30',
            'phone' => 'required|string|max:15',
            'job_title' => 'nullable|string|max:128',
            'company_name' => 'nullable|string|max:128',
            'message' => 'required|string|max:512',
        ]);

        DB::beginTransaction();
        try {

            $inquiry    = new Inquiry();
            $inquiry->vcard_id       = $request->vcard_id;
            $inquiry->name           = $request->name;
            $inquiry->email          = $request->email;
            $inquiry->phone          = $request->phone;
            $inquiry->job_title      = $request->job_title;
            $inquiry->company_name   = $request->company_name;
            $inquiry->message        = $request->message;
            $inquiry->save();

            $data = [];
            $data = [
                'greeting'    => 'Hello,',
                'body' => 'A user sent a contact message to your vcard - <a href="' . route('card.preview', $vcard->url_alias) . '">' . $vcard->url_alias . '</a>. Please review and respond to the user\'s query as soon as possible.',
                'name'        => 'User name- '.$request->name,
                'email'       => 'User email- '.$request->email,
                'phone'       => 'User phone- '.$request->phone,
                'link'        => route('user.contact.index'),
                'msg'         => 'Click here to navigate to the query',
                'thanks'      => 'Thank you and stay with ' . ' ' . config('app.name'),
                'site_url'    => route('home'),
                'footer'      => '0',
                'site_name'   => config('app.name'),
                'copyright'   => ' © ' . ' ' . Carbon::now()->format('Y') .' '. config('app.name') . ' ' . 'All rights reserved.',
            ];

           


        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Toastr::error((__('messages.toastr.query_submit_error')), __('messages.common.error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        DB::commit();

        Mail::to($vcard->user->email)->send(new VcardContact($data));

        Toastr::success((__('messages.toastr.query_submitted')), __('messages.common.success'), ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function updateContactSaved($card_id)
    {
        $card = Card::find($card_id);
        $card->increment('total_contact_saved');
        return response()->json(['success' => true]);
    }
}
