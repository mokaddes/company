<header class="navbar top_header navbar-expand-md navbar-light d-print-none d-md-none d-lg-none d-xl-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset($settings->site_logo) }}" width="110" height="32" alt="{{ $settings->site_name }}"
                    class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
           
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="">
                        @if (Auth::user()->profile_image)
                        <img src="{{ asset(Auth::user()->profile_image) }}" alt="{{ auth::user()->name }}"
                            class="avatar avatar-sm avatar-rounded">
                        @else
                        <img src="{{ asset('assets/img/avatar/1.jpg') }}" alt="{{ auth::user()->name }}"
                            class="avatar avatar-sm avatar-rounded">
                        @endif
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted">{{ __('Administrator') }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('admin.account') }}" class="dropdown-item">{{ __('Profile & account') }}</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{
                        __('Logout') }}</a>
                    <form class="logout" id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
