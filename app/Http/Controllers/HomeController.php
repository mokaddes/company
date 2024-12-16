<?php

namespace App\Http\Controllers;

use App\Mail\SendContact;
use App\Models\AboutServiceContent;
use App\Models\Blog;
use App\Models\PageImage;
use App\Models\Faq;
use App\Models\Service;
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
use App\Models\WhyUse;
use App\Models\Work;
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
        $services = Service::orderBy('order_number')->where('status', 1)->get();
        $activeService = Service::orderBy('order_number')->where('status', 1)->first();
        $metadata = Seo::where('page_slug', 'home')->first(['page_slug', 'title', 'keywords', 'description', 'image']);
        return inertia('Home',[
            'content' => $content,
            'clients' => $clients,
            'services' => $services,
            'activeService' => $activeService,
            'metaData' => $metadata
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
        $metadata = Seo::where('page_slug', 'about')->first(['page_slug', 'title', 'keywords', 'description', 'image']);
//        dd($metadata);
        return inertia('About',[
            'about' => $about,
            'teams' => $teams,
            'metaData' => $metadata
        ]);
    }

    public function work()
    {
        // inertia view work
        $data['works'] = Work::where('status', 1)->latest()->get();
        $data['metaData'] = Seo::where('page_slug', 'work')->first();
        return inertia('Work/Index', $data);
    }

    public function workDetail($slug)
    {
        $work = Work::where('slug', $slug)->firstOrFail();

        // Fetch the previous work item based on order_number
        $prev = Work::where('order_number', '<=', $work->order_number)
            ->where('slug', '!=', $slug)
            ->orderBy('order_number', 'desc')
            ->first();


        // Fetch the next work item based on order_number
        $next = Work::where('order_number', '>', $work->order_number)
            ->orderBy('order_number', 'asc')
            ->first();


        return inertia('Work/Details', [
            'work' => $work,
            'prev' => $prev,
            'next' => $next,
        ]);
    }


    public function contact()
    {
        // inertia view contact
        $metadata = Seo::where('page_slug', 'contact')->first(['page_slug', 'title', 'keywords', 'description', 'image']);
        return inertia('Contact', [
            'metaData' => $metadata
        ]);
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
        $blogs = Blog::where('status', 1)->get();
        $metadata = Seo::where('page_slug', 'blog')->first(['page_slug', 'title', 'keywords', 'description', 'image']);
        return inertia('Blog/Index',[
            'blogs' => $blogs,
            'metaData' => $metadata
        ]);
    }

    public function blogDetail($slug)
    {
        // inertia view blog detail
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $relatedBlog = Blog::where('category_id', $blog->category_id)->where('slug', '!=', $slug)->limit(3)->get();
        return inertia('Blog/Details',[
            'blog' => $blog,
            'relatedBlog' => $relatedBlog
        ]);
    }

    public function service()
    {
        // inertia view service
        $services = Service::orderBy('order_number')->where('status', 1)->get();
        $activeServices = Service::orderBy('order_number')->where('status', 1)->first();
        $why_uses = WhyUse::orderBy('order_number')->where('status', 1)->get();
        $metadata = Seo::where('page_slug', 'service')->first(['page_slug', 'title', 'keywords', 'description', 'image']);
        return inertia('Service',[
            'services' => $services,
            'activeService' => $activeServices,
            'whyUses' => $why_uses,
            'metaData' => $metadata
        ]);
    }

    public function shift()
    {
        // inertia view shift
        return inertia('Shift');
    }

}
