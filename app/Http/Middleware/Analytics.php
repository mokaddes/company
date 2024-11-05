<?php

namespace App\Http\Middleware;

use App\Models\CardAnalytic;
use App\Models\Card;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

//use Route;

class Analytics
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = str_replace($request->root(), '', $request->url()) ?: '/';
        $urlAlias = Route::current()->parameters['card_url'];
        $vcard = Card::where('url_alias', $urlAlias);
        $vcardId = $vcard->pluck('id')->toArray();
        $vcard = $vcard->first();

        if(!$vcard) 
        {
            abort(404);
        }

        if(Auth::check())
        {
            if($vcard->user_id == Auth::user()->id) 
            {
                return $next($request);
            }
        }



        $vcard->total_view = $vcard->total_view + 1;
        $vcard->save();
        
        $agent = new Agent();
        if (! $agent->isRobot()) {
            $agent->setUserAgent($request->headers->get('user-agent'));
            $agent->setHttpHeaders($request->headers);
            $sessionExists = CardAnalytic::where('session', $request->session()->getId())->where('vcard_id',
                $vcardId[0])->exists();
            if ($sessionExists) {
                return $next($request);
            }

            $items = implode($agent->languages());
            $lang = substr($items, 0, 2);
            $ip = Location::get($request->ip());
            $country = $ip ? $ip->countryName : null;
            CardAnalytic::create([
                'session' => $request->session()->getId(),
                'vcard_id' => $vcardId[0],
                'uri' => $uri,
                'source' => $request->headers->get('referer'),
                'country' => $country,
                'browser' => $agent->browser() ?? null,
                'device' => $agent->deviceType(),
                'operating_system' => $agent->platform(),
                'ip' => $request->ip(),
                'language' => $lang,
                'meta' => json_encode(Location::get($request->ip())),
            ]);

            return $next($request);
        }

        return $next($request);
    }
}
