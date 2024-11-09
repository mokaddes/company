<?php

use App\Models\Card;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

if (!function_exists('getSetting')) {
    /**
     * @return mixed
     */
    function getSetting():Setting
    {
        $setting = Setting::orderBy('id','DESC')->first();
        $setting->logo = getLogo($setting->site_logo);
        $setting->favicon = getLogo($setting->favicon);
        return $setting;
    }
}

function checkFrontLanguageSession()
{
    if (Session::has('languageName')) {
        return Session::get('languageName');
    }
    return 'de';
}

function checkCardLanguageSession()
{
    if (Session::has('cardLang')) {
        return Session::get('cardLang');
    }
    return geDefaultLanguage()->iso_code;
}

function getLanguageByKey($key)
{
    $languageName = Language::where('iso_code', $key)->first();

    if (!empty($languageName['name'])) {
        return $languageName['name'];
    }

    return 'German';
}

if (!function_exists('getAllLanguageWithFullData')) {
    function getAllLanguageWithFullData()
    {
        return Language::all();
    }
}
if (!function_exists('getFlagByIsoCode')) {
    function getFlagByIsoCode($isoCode)
    {
        $language = Language::where('iso_code', $isoCode)->first();
        return $language ? $language->flag : null;
    }
}

if (!function_exists('geDefaultLanguage')) {
    function geDefaultLanguage()
    {
        return Language::where('is_default', 1)->first();
    }
}

if (!function_exists('isMobile')) {
    function isMobile(): bool
    {
        if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile')) {
            return true;
        } else {
            return false;
        }
        // return false;
    }
}
/*Print Validation Error List*/
if (!function_exists('vError')) {
    function vError($errors)
    {
        if ($errors->any()){
            foreach ($errors->all() as $error){
                echo '<li class="text-danger">'. $error .'</li>';
            }
        }
        else {
            echo 'Not found any validation error';
        }
    }
}

if (!function_exists('get_error_response')) {
    function get_error_response($code, $reason, $errors = [],  $error_as_string = '', $description = ''): array
    {
        if ($error_as_string == '') {
            $error_as_string = $reason;
        }
        if ($description == '') {
            $description = $reason;
        }
        return [
            'code'          => $code,
            'errors'        => $errors,
            'error_as_string'  => $error_as_string,
            'reason'        => $reason,
            'description'   => $description,
            'error_code'    => $code,
            'link'          => ''
        ];
    }
}

if (!function_exists('checkPackageValidity')) {
    function checkPackageValidity($user_id): bool
    {
        $user = DB::table('users')->where('id',$user_id)->first();
        $today = strtotime("today midnight");
        $expire = strtotime($user->plan_validity);
        if($today >= $expire){
            return false;
        } else {
            return true;
        }
    }
}


if (!function_exists('checkCardLimit')) {
    function checkCardLimit($user_id): bool
    {
        $user = DB::table('users')->where('id',$user_id)->first();
        if($user->plan_details){
            $plan_details = json_decode($user->plan_details,true);
            if($plan_details['no_of_vcards'] != 9999){
                $user_card = DB::table('business_cards')->where('status',1)->where('user_id',$user_id)->count();
                if($plan_details['no_of_vcards'] <=  $user_card){
                    return false ;
                }
            }
        }
        return true;
    }
}
if (!function_exists('getPhoto')) {
    function getPhoto($path): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/img/card/personal.png');
           }
        }else{
            return asset('assets/img/card/personal.png');
        }
    }
}


if (!function_exists('getAvatar')) {
    function getAvatar($path)
    {
        if(!empty($path)){
              return $path;
            } else {
            // return asset('assets/img/card/personal.png');
            return asset('assets/image/default-profile.png');
        }
    }
}


if (!function_exists('getCover')) {
    function getCover($path = null): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/img/default-cover.png');
           }
        }else{
            return asset('assets/img/default-cover.png');
        }
    }
}
if (!function_exists('getProfile')) {
    function getProfile($path = null): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/images/user.jpg');
           }
        }else{
            return asset('assets/images/user.jpg');
        }

    }
}
if (!function_exists('getLogo')) {
    function getLogo($path = null): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/images/default-icon.png');
           }
        }else{
            return asset('assets/images/default-icon.png');
        }
    }
}

if (!function_exists('getIcon')) {
    function getIcon($path = null): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/images/default-icon.png');
           }
        }else{
            return asset('assets/images/default-icon.png');
        }
    }
}
if (!function_exists('getBanner')) {
    function getBanner($path = null): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/images/default-banner.png');
           }
        }else{
            return asset('assets/images/default-banner.png');
        }
    }
}
if (!function_exists('getSeoImage')) {
    function getSeoImage($path = null): string
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/images/default-seo.png');
           }
        }else{
            return asset('assets/images/default-seo.png');
        }
    }
}

function checkPlanValidity(): bool
{
    $validity = false;
    $now = Carbon::now();
    $user = auth()->user();
    if ($user->current_pan_valid_date > $now) {
        return true;
    }

    return $validity;
}

function checkTotalVcard(): bool
{
    $makeVcard = false;
    $user = auth()->user();
    $plan = User::where('id', $user->id)->first()->userPlan;

    if (! empty($plan)) {
        $totalCards = Card::where('user_id',$user->id)->count();
        $makeVcard = $plan->no_of_vcards > $totalCards;
    }

    return $makeVcard;
}

function checkPlanFeature(string $feature): bool
{
    $user = auth()->user();
    $plan = User::where('id', $user->id)->first()->userPlan;

    if (!empty($plan)) {
        return $plan->$feature == 1;
    }

    return false;
}

function checkUserPlanFeature(int $userId, string $feature): bool
{
    $user = User::find($userId);

    if ($user && $user->userPlan) {
        $plan = $user->userPlan;

        if (!empty($plan)) {
            return $plan->$feature == 1;
        }
    }

    return false;
}

if (!function_exists('getDesigComp')) {
    function getDesigComp($desig,$comp): string
    {
        if($desig != '' & $comp != '' ){
            return  $desig.' At '.$comp;
        }else{
            return  $desig.' '.$comp;
        }

    }
}


if (!function_exists('makeUrl')) {
    function makeUrl($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "https://" . $url;
        }
        return $url;
    }
}

if (!function_exists('getSocialIcon')) {
    function getSocialIcon($ikey)
    {
        return DB::table('social_icon')->where('icon_name','=',$ikey)->first();
    }
}
if (!function_exists('getCurrencySymbol')) {
    function getCurrencySymbol($key)
    {
        return Currency::where('id',$key)->first()->symbol;
    }
}

if (!function_exists('getDefaultCurrencySymbol')) {
    function getDefaultCurrencySymbol(): string
    {
        // $currency = DB::table('country')->where('is_default', 1)->first();
        return "€";
    }
}

if (!function_exists('CurrencyFormat')) {
    function CurrencyFormat($number, $decimal = 1) { // cents: 0=never, 1=if needed, 2=always
        if (is_numeric($number)) { // a number
            if (!$number) { // zero
            $money = ($decimal == 2 ? '0.00' : '0'); // output zero
            } else { // value
            if (floor($number) == $number) { // whole number
                $money = number_format($number, ($decimal == 2 ? 2 : 0)); // format
            } else { // cents
                $money = number_format(round($number, 2), ($decimal == 0 ? 0 : 2)); // format
            } // integer or decimal
            } // value
            return $money;
        }else{
            return $number;
        } // numeric
    } //
}


function formatFileName($file): string
{
    $base_name = preg_replace('/\..+$/', '', $file->getClientOriginalName());
    $base_name = explode(' ', $base_name);
    $base_name = implode('-', $base_name);
    $base_name = Str::lower($base_name);
    return $base_name."-".uniqid().".".$file->getClientOriginalExtension();
}

function checkPackage($id = null): bool
{
    if($id){
        $user = DB::table('users')->where('id',$id)->first();
        if($user->plan_id){
            return true;
        }else{
            return false;
        }
    }else{
        return true;
    }
}


function isFreePlan($user_id): bool
{
    $user = DB::table('users')->select('plans.is_free')->leftJoin('plans','plans.id','=','users.plan_id')->where('users.id',$user_id)->first();
    if($user->is_free==1){
        return true;
    }
    return false;
}
function isAnnualPlan($user_id): bool
{
    $user = DB::table('users')->select('users.*','plans.is_free')
    ->leftJoin('plans','plans.id','=','users.plan_id')
    ->where('users.id',$user_id)
    ->first();
    $subscription_end = new Carbon($user->plan_validity);
    $subscription_start = new Carbon($user->plan_activation_date);
    $diff_in_days = $subscription_start->diffInDays($subscription_end);
    if($diff_in_days > 364 && $user->is_free==0){
        return true;
    }
    return false;
}


function getPlan($user_id){
    return DB::table('users')
    ->select('plans.*')
    ->leftJoin('plans','plans.id','=','users.plan_id')
    ->where('users.id',$user_id)
    ->first();
}

function uploadImage(?object $file, string $path, int $width, int $height): string
{
    // $width = 850;
    // $height = 650;
    $blank_img =  Image::canvas($width, $height, '#EBEEF7');
    $pathCreate = public_path("/uploads/$path/");
    if (!File::isDirectory($pathCreate)) {
        File::makeDirectory($pathCreate, 0777, true, true);
    }

    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $updated_img = Image::make($file->getRealPath());
    $imageWidth = $updated_img->width();
    $imageHeight = $updated_img->height();
    if ($imageWidth > $width) {

        $updated_img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
    if ($imageHeight > $height) {

        $updated_img->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
    }


    $blank_img->insert($updated_img, 'center');
    $blank_img->save(public_path('/uploads/' . $path . '/') . $fileName);
    return "uploads/$path/" . $fileName;
}

if (!function_exists('checkCustomPage')) {
    function checkCustomPage($slug): bool
    {
        return DB::table('custom_pages')->where('url_slug',$slug)->where('is_active', 1)->exists();
    }
}

