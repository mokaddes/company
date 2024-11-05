<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardAnalytic;
use App\Models\Inquiry;
use App\Models\SocialIcon;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CardController extends Controller
{

    public  function index(Request $request){


        $data['title'] = __('messages.common.card');

        $query = Card::with(['user' => function ($query) {
            return $query->where('status', 1);
        }])->withCount('analytics')->orderBy('id', 'desc');

        if (request()->has('user_id')){
            $data['cards']=$query->where('user_id',request()->get('user_id'));
        }
        $data['cards']=$query->get();

        return view('admin.card.index', $data);
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


    public function edit($id)
    {
        $data['title'] = __('messages.common.edit_card');
        $data['card'] = Card::with('icons')->findOrFail($id);

        return view('admin.card.edit', $data);

    }


    public function update($id, Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:60',
            'address' => 'required|string|max:256',
            'company_name' => 'required|string|max:60',
            'designation' => 'required|string|max:60',
        ]);

        DB::beginTransaction();
        try {

            $card    = Card::find($id);
            $card->template_id  = $request->theme_id;
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

            if ($request->has('profile_image_path') && $card->profile_image  !== $request->profile_image_path) {

                if (File::exists($card->profile_image)) {
                    File::delete($card->profile_image);
                }

                $card->profile_image  = $request->profile_image_path;
            }

            if ($request->has('cover_image_path') && $card->cover_image !== $request->cover_image_path) {

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
            $social_icon->spotify = $request->telegram;
            // $social_icon->paypal = $request->paypal;
            $social_icon->save();

        } catch (\Exception $e) {
            // dd($e->getMessage());
            DB::rollback();
            Toastr::error(__('messages.toastr.card_update_error'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        DB::commit();
        Toastr::success(__('messages.toastr.card_update_success'), trans('Success'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.card.index');
    }

    public function delete($id)
    {

        try {

            DB::beginTransaction();

            $card = Card::find($id);

            if (File::exists($card->profile_image)) {
                File::delete($card->profile_image);
            }
            if (File::exists($card->cover_image)) {
                File::delete($card->cover_image);
            }

            CardAnalytic::where('vcard_id',$id)->delete();
            SocialIcon::where('vcard_id',$id)->delete();
            Inquiry::where('vcard_id',$id)->delete();
            $card->delete();

            Toastr::success(__('messages.toastr.card_delete_success'));

        } catch (Exception $ex) {
            DB::rollback();
            // dd($ex);
            Toastr::error(__('messages.toastr.card_delete_error'));

        }
        DB::commit();
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
}
