<!-- ======================= header start  ============================ -->
<header class="header-sec sticky-top">
    <nav class="navbar navbar-expand-lg p-0">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{getIcon($settings->site_logo)}}" class="img-fluid" style="height: 50px;" alt="Image">
            </a>
            <div class="d-flex align-items-center">
                <div class="me-2">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="d-block d-lg-none">
                    @auth
                    <a class="btn btn-sm btn-primary" href="{{route('user.dashboard')}}">
                        <i class="fa fa-user"></i>
                        {{ __('messages.nav.dashboard') }}
                    </a>
                    @else
                    <a class="btn btn-sm btn-primary" href="{{route('login')}}">
                        <i class="fa fa-plus"></i>
                        {{ __('messages.nav.login') }}
                    </a>
                    @endauth
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto d-flex align-items-lg-center">
                    <a class="nav-link {{Route::currentRouteName() == 'frontend.home' ? 'nav-active' : ''}}"
                        href="{{route('frontend.home')}}">{{ __('messages.nav.home') }}</a>
                    <a class="nav-link {{Route::currentRouteName() == 'frontend.about' ? 'nav-active' : ''}}"
                        href="{{route('frontend.about')}}">{{ __('messages.nav.about') }}</a>
                    <a class="nav-link {{Route::currentRouteName() == 'frontend.pricing' ? 'nav-active' : ''}}"
                        href="{{route('frontend.pricing')}}">{{ __('messages.nav.pricing') }}</a>
                    <a class="nav-link {{Route::currentRouteName() == 'frontend.faq' ? 'nav-active' : ''}}"
                        href="{{route('frontend.faq')}}">{{ __('messages.nav.faq') }}</a>
                    <a class="nav-link {{Route::currentRouteName() == 'frontend.contact' ? 'nav-active' : ''}}"
                        href="{{route('frontend.contact')}}">{{ __('messages.nav.contact') }}</a>
                    <li class="nav-link">
                        @php
                            $lang_code = checkFrontLanguageSession() ?? geDefaultLanguage()->iso_code;
                        @endphp
                        <div class="dropdown">
                            <a class="dropdown-toggle px-0 text-white" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="flag" src="{{getIcon(getFlagByIsoCode($lang_code))}}" alt="{{ getLanguageByKey($lang_code) }}">
                                {{ getLanguageByKey($lang_code) }}
                            </a>
                            <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                                @foreach (getAllLanguageWithFullData() as $key => $language)
                                <li class="languageSelection m-2" data-prefix-value="{{ $language->iso_code }}">
                                    <img class="flag" src="{{ getIcon($language->flag) }}" alt="{{ $language->name }}" style="height: 25px">
                                    <span style="cursor: pointer;">{{ $language->name }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @auth
                    <a class="btn btn-sm btn-primary d-none d-lg-block" href="{{route('user.dashboard')}}">
                        {{ __('messages.nav.dashboard') }}
                    </a>
                    @else
                    <a class="btn btn-sm btn-primary d-none d-lg-block" href="{{route('login')}}">
                        {{ __('messages.nav.login') }}
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ======================= header end  ============================ -->
