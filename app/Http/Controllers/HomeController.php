<?php

namespace App\Http\Controllers;

use App\Mail\SendContact;
use App\Models\AboutServiceContent;
use App\Models\PageImage;
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
    public function index()
    {
        // inertia view welcome
        $content = HomeContent::first();
        $content->banner_video = asset($content->image);
        $content->footer_image = asset($content->footer_image);
        $clients = PageImage::where('type', 'client')->get()->map(function ($client) {
            $client->image = asset($client->image);
            return $client;
        });
        return inertia('Home',[
            'content' => $content,
            'clients' => $clients
        ]);
    }

    public function about()
    {
        $about = AboutServiceContent::where('page_type', 'about')->first();
        $about->image = asset($about->image);
        $teams = PageImage::where('type', 'team')->get()->map(function ($team) {
            $team->image = asset($team->image);
            return $team;
        });
        return inertia('About',[
            'about' => $about,
            'teams' => $teams
        ]);
    }

    public function work()
    {
        // inertia view work
        return inertia('Work/Index');
    }

    public function workDetail($slug)
    {
        $work = [
            'id' => 1,
            'slug' => $slug,
            'title' => 'Powering Pet Owners with Samsung Floorcare',
            'category' => 'Experiential / Retail',
            'video' => 'assets/images/coverVideoMO.mp4',
            'image' => 'assets/images/coverMO.jpg',

        ];
        return inertia('Work/Details', [
            'work' => $work
        ]);
    }

    public function contact()
    {
        // inertia view contact
        return inertia('Contact');
    }

    public function contactSubmit(Request $request)
    {
        // validate request
        $request->validate([
            'firstName' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // store contact
        $contact = new Contact();
        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        // send email
//        Mail::to(Setting::first()->email)->send(new SendContact($contact));

        // redirect back
        Toastr::success('Message sent successfully');
        return response()->json(['success' => true]);
    }

    public function blog()
    {
        // inertia view blog
        return inertia('Blog/Index');
    }

    public function blogDetail()
    {
        // inertia view blog detail
        return inertia('Blog/Details');
    }

    public function service()
    {
        // inertia view service
        return inertia('Service');
    }

    public function shift()
    {
        // inertia view shift
        return inertia('Shift');
    }

}
