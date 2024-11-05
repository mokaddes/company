<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
                <i class="fas fa-globe fa-2"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.cacheClear') }}" class="nav-link">
                <i class="fas fa-broom"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> --}}
        @php
            $lang_code = checkFrontLanguageSession() ?? geDefaultLanguage()->iso_code;
        @endphp
        
        <li class="nav-link">
            <div class="dropdown">
                <a class="dropdown-toggle px-0 text-light" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-expanded="false">
                    <img class="flag" src="{{getIcon(getFlagByIsoCode($lang_code))}}" alt="{{ getLanguageByKey($lang_code) }}" style="height: 25px">
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
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span class="image">
                    <img src="{{ getProfile(Auth::user()->image) }}" alt="{{ auth::user()->name }}"
                        class="rounded shadow-sm" width="30">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item"><i class="fa fa-user" aria-hidden="true"></i> {{__('messages.common.profile')}}</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('messages.common.logout')}}</a>
                <form class="logout" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>


    </ul>
</nav>
<!-- /.navbar -->
