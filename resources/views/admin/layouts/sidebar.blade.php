@php
    $settings = DB::table('settings')->first();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        {{-- <span class="brand-text font-weight-light">{{ $settings->site_name }}</span> --}}
        <span class="brand-text font-weight-light">
            <img src="{{ getIcon($settings->site_logo)}}" alt="" style="height: 30px;">
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboard')" title="Dashboard">
                        <i class="nav-icon fa fa-home"></i>
                        <p>{{__('messages.common.dashboard')}}</p>
                    </a>
                </li>
                @if (Auth::user()->can('admin.customer.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.customer.index') }}" class="nav-link @yield('customer')" title="">
                            <i class="nav-icon fa fa-users"></i>
                            <p>{{__('messages.common.user')}}</p>
                        </a>
                    </li>
                @endif


                @if (Auth::user()->can('admin.card.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.card.index') }}" class="nav-link @yield('card')" title="">
                        <i class="nav-icon fa fa-address-card"></i>
                        <p>{{__('messages.common.card')}}</p>
                    </a>
                </li>
                @endif
                @if (Auth::user()->can('admin.plan.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.plan.index') }}" class="nav-link @yield('plan')" title="">
                        <i class="nav-icon fa fa-money-bill-alt"></i>
                        <p>{{__('messages.common.plan')}}</p>
                    </a>
                </li>
                @endif
                @if (Auth::user()->can('admin.transaction.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.transaction.index') }}" class="nav-link @yield('transaction')" title="">
                        <i class="nav-icon fa fa-dollar"></i>
                        <p>{{__('messages.common.transaction')}}</p>
                    </a>
                </li>
                @endif
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.industry.index') }}"
                        class="nav-link {{ Request::routeIs('admin.industry.index') ? 'active' : '' }}">
                        <i class="fa fa-building"></i>
                        {{ __('Industry') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.location.index') }}"
                        class="nav-link {{ Request::routeIs('admin.location.index') ? 'active' : '' }}">
                        <i class="fa fa-location-dot"></i>
                        {{ __('Location') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.investment.index') }}"
                        class="nav-link {{ Request::routeIs('admin.investment.index') ? 'active' : '' }}">
                        <i class="fa fa-dollar"></i>
                        {{ __('Investment') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.franchises.index') }}"
                        class="nav-link {{ Request::routeIs('admin.franchises.index') ? 'active' : '' }} @yield('franchises_create')">
                        <i class="fa fa-file"></i>
                        {{ __('All Listing') }}
                    </a>
                </li>
                --}}
                {{--
                    <li class="nav-item @yield('blogDropdown')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-pen"></i>
                        <p> Blog <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview @yield('blockDropdownMenu')">
                        @if (Auth::user()->can('admin.blog-category.index'))
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-category.index') }}" class="nav-link @yield('blog-category')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blog Category</p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->can('admin.blog-post.index'))
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-post.index') }}" class="nav-link  @yield('blog-post')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blog Post</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </li>
                --}}

                {{-- @if (Auth::user()->can('admin.category.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link @yield('category')">
                            <i class="fa fa-address-book"></i>
                            {{ __('Category') }}
                        </a>
                    </li>
                @endif --}}
                {{--
                @if (Auth::user()->can('admin.subcategory.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.subcategory.index') }}" class="nav-link @yield('subcategory')">
                            <i class="fa fa-address-book"></i>
                            {{ __('Sub Category') }}
                        </a>
                    </li>
                @endif --}}


                @if (Auth::user()->can('admin.contact.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.contact.index') }}" class="nav-link  @yield('contact')" title="">
                            <i class="nav-icon fa fa-address-book"></i>
                            <p>{{__('messages.common.contact')}}</p>
                        </a>
                    </li>
                @endif



                @if (Auth::user()->can('admin.faq.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.faq.index') }}" class="nav-link @yield('faq')" title="">
                            <i class="nav-icon fa fa-question"></i>
                            <p>{{__('messages.common.faq')}}</p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->can('admin.faq.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.testimonial.index') }}" class="nav-link @yield('testimonial')" title="">
                            <i class="nav-icon far fa-comment-alt"></i>
                            <p>{{__('messages.common.testimonial')}}</p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->can('admin.cpage.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.cpage.index') }}" class="nav-link  @yield('cpage')" title="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="nav-icon">
                                <g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path d="M7 18h7m-7-4h1m-1-4h3M7 2h9.5L21 6.5V19"/>
                                    <path d="M3 20.5v-14A1.5 1.5 0 0 1 4.5 5h9.752a.6.6 0 0 1 .424.176l3.148
                                    3.148A.6.6 0 0 1 18 8.75V20.5a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 3 20.5"/>
                                    <path d="M14 5v3.4a.6.6 0 0 0 .6.6H18"/>
                                </g>
                            </svg>
                            <p>{{__('messages.common.custom_page')}}</p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->can('admin.seo.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.seo.index') }}" class="nav-link @yield('seo')" title="">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"
                            fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"
                            stroke-linejoin="round"  class="nav-icon icon icon-tabler icons-tabler-outline icon-tabler-world-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 12a9 9 0 1 0 -9 9" /><path d="M3.6 9h16.8" />
                            <path d="M3.6 15h7.9" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a16.984 16.984 0 0 1 2.574 8.62" />
                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" />
                        </svg>
                        <p>{{__('messages.common.seo')}}</p>
                    </a>
                </li>
                @endif
                

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}"
                        class="nav-link @yield('admin-user')" title="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36" class="nav-icon"><path fill="white" d="M14.68 14.81a6.76 6.76 0 1 1 6.76-6.75a6.77 6.77
                            0 0 1-6.76 6.75m0-11.51a4.76 4.76 0 1 0 4.76 4.76a4.76 4.76 0 0 0-4.76-4.76" class="clr-i-outline clr-i-outline-path-1"/><path fill="white" d="M16.42
                            31.68A2.14 2.14 0 0 1 15.8 30H4v-5.78a14.81 14.81 0 0 1 11.09-4.68h.72a2.2 2.2 0 0 1 .62-1.85l.12-.11c-.47 0-1-.06-1.46-.06A16.47 16.47 0 0 0 2.2 23.26a1
                            1 0 0 0-.2.6V30a2 2 0 0 0 2 2h12.7Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="white" d="M26.87 16.29a.37.37 0 0 1 .15 0a.42.42 0 0 0-.15 0"
                            class="clr-i-outline clr-i-outline-path-3"/><path fill="white" d="m33.68 23.32l-2-.61a7.21 7.21 0 0 0-.58-1.41l1-1.86A.38.38 0 0 0 32 19l-1.45-1.45a.36.36
                            0 0 0-.44-.07l-1.84 1a7.15 7.15 0 0 0-1.43-.61l-.61-2a.36.36 0 0 0-.36-.24h-2.05a.36.36 0 0 0-.35.26l-.61 2a7 7 0 0 0-1.44.6l-1.82-1a.35.35 0 0
                            0-.43.07L17.69 19a.38.38 0 0 0-.06.44l1 1.82a6.77 6.77 0 0 0-.63 1.43l-2 .6a.36.36 0 0 0-.26.35v2.05A.35.35 0 0 0 16 26l2 .61a7 7 0 0 0 .6 1.41l-1
                            1.91a.36.36 0 0 0 .06.43l1.45 1.45a.38.38 0 0 0 .44.07l1.87-1a7.09 7.09 0 0 0 1.4.57l.6 2a.38.38 0 0 0 .35.26h2.05a.37.37 0 0 0 .35-.26l.61-2.05a6.92
                            6.92 0 0 0 1.38-.57l1.89 1a.36.36 0 0 0 .43-.07L32 30.4a.35.35 0 0 0 0-.4l-1-1.88a7 7 0 0 0 .58-1.39l2-.61a.36.36 0 0 0 .26-.35v-2.1a.36.36 0 0
                            0-.16-.35M24.85 28a3.34 3.34 0 1 1 3.33-3.33A3.34 3.34 0 0 1 24.85 28" class="clr-i-outline clr-i-outline-path-4"/>
                            <path fill="none" d="M0 0h36v36H0z"/>
                        </svg>
                        <p>{{__('messages.roles.admin')}}</p>
                    </a>
                </li>
                @if (Auth::user()->can('admin.roles.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}"
                        class="nav-link @yield('admin-roles')" title="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="nav-icon">
                            <circle cx="17" cy="15.5" r="1.12" fill="white" fill-rule="evenodd"/><path fill="white" fill-rule="evenodd"
                            d="M17 17.5c-.73 0-2.19.36-2.24 1.08c.5.71 1.32 1.17 2.24 1.17s1.74-.46 2.24-1.17c-.05-.72-1.51-1.08-2.24-1.08"/>
                            <path fill="white" fill-rule="evenodd" d="M18 11.09V6.27L10.5 3L3 6.27v4.91c0 4.54 3.2 8.79 7.5 9.82c.55-.13 1.08-.32 1.6-.55A5.973 5.973
                            0 0 0 17 23c3.31 0 6-2.69 6-6c0-2.97-2.16-5.43-5-5.91M11 17c0 .56.08 1.11.23 1.62c-.24.11-.48.22-.73.3c-3.17-1-5.5-4.24-5.5-7.74v-3.6l5.5-2.4l5.5
                            2.4v3.51c-2.84.48-5 2.94-5 5.91m6 4c-2.21 0-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4s-1.79 4-4 4"/>
                        </svg>
                        <p>{{__('messages.common.admin_roles')}}</p>
                    </a>
                </li>
                @endif
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="nav-link @yield('admin-permissions')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" class="nav-icon"><path fill="white" d="M12 4a5 5 0 1 1-5 5a5 5 0 0 1
                            5-5m0-2a7 7 0 1 0 7 7a7 7 0 0 0-7-7m10 28h-2v-5a5 5 0 0 0-5-5H9a5 5 0 0 0-5 5v5H2v-5a7 7 0 0 1 7-7h6a7 7 0 0 1 7
                            7zm3-13.82l-2.59-2.59L21 15l4 4l7-7l-1.41-1.41z"/>
                        </svg>
                        <p>{{ __('Admin permissions') }}</p>
                    </a>
                </li> --}}

                @if (Auth::user()->can('admin.settings.general') ||Auth::user()->can('admin.settings.home.content') ||Auth::user()->can('admin.settings.Smtp.mail'))
                <li class="nav-item @yield('settings_menu') ">
                    <a href="javascript:void(0)" class="nav-link " title="">
                        <i class="nav-icon fa fa-gear"></i>
                        <p>{{__('messages.common.settings')}}<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview @yield('settings_menu')">
                        @if (Auth::user()->can('admin.settings.general'))
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.general') }}" class="nav-link @yield('general')" title=" Website General Settings">
                                <i class="fa fa-circle"></i>
                                <p>{{__('messages.common.general_settings')}}</p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('admin.settings.home.content'))
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.home.content') }}" class="nav-link @yield('home')" title="Home page content">
                                <i class="fa fa-circle"></i>
                                <p>{{__('messages.common.home_page_content')}}</p>
                            </a>
                        </li>
                        @endif
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.settings.language') }}" class="nav-link @yield('language')">
                                <i class="fas fa-globe nav-icon"></i>
                                <p>Language</p>
                            </a>
                        </li> --}}
                        @if (Auth::user()->can('admin.settings.Smtp.mail'))
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.Smtp.mail') }}" class="nav-link @yield('smtp')" title="Test Mail">
                                <i class="fa fa-circle"></i>
                                <p>{{__('messages.common.test_mail')}}</p>
                            </a>
                        </li>
                        @endif
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.settings.Currency.index') }}" class="nav-link @yield('currency')">
                                <i class="fas fa-dollar-sign nav-icon"></i>
                                <p>Currency</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.MobileApp.index') }}"
                                class="nav-link @yield('mobile_app')">
                                <i class="fas fa-mobile nav-icon"></i>
                                <p>Mobile App Config</p>
                            </a>
                        </li> --}}

                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
