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
    public function index()
    {
        // inertia view welcome
        return inertia('Home');
    }

    public function about()
    {
        // inertia view about
        return inertia('About');
    }

    public function work()
    {
        // inertia view work
        return inertia('Work');
    }

    public function contact()
    {
        // inertia view contact
        return inertia('Contact');
    }

    public function blog()
    {
        // inertia view blog
        return inertia('Blog');
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
