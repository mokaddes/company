{{-- breadcrumb --}}
<section class="page-breadcrumb breadcrumb_sec py-3"> 
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.nav.home')}}</a></li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
</section>
