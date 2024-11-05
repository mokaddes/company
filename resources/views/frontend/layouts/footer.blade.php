@if (!request()->routeIs('login') && !request()->routeIs('register') && !request()->is('password/reset*'))
    <!-- ======================= hero start  ============================ -->
    @php
        $homeContent = DB::table('home_page_contents')->first();
        $localLanguage = Session::get('languageName');
    @endphp
    <div class="hero-section pt-60 pb-60">
        <div class="container">
            <div class="hero-content text-center">
                <h4 class="mb-4">
                    <h2 class="title mb-4">
                        @if ($localLanguage == 'en')
                            {{ $homeContent->col19_en }}
                        @else
                            {{ $homeContent->col19_gr }}
                        @endif
                    </h2>
                </h4>
                {{-- <h4 class="mb-4">{{__('messages.footer.ready_to_dive')}}.</h4> --}}
                <a href="{{ auth()->check() ? route('user.card.theme') : route('login') }}"
                    class="btn btn-primary">{{ __('messages.footer.start_now') }}</a>
            </div>
        </div>
    </div>
    <!-- ======================= hero end  ============================ -->
@endif
<!-- ======================= footer start ============================ -->
<footer class="footer-section">
    <div class="container">
        <div class="">

            <div class="text-center">
                <div class="footer-link">
                    <ul>
                        @if (checkCustomPage('privacy-policy'))
                            <li class="me-3"><a
                                    href="{{ route('frontend.privacy-policy') }}">{{ __('messages.footer.privacy_policy') }}</a>
                            </li>
                        @endif
                        @if (checkCustomPage('terms-and-conditions'))
                            <li class="me-3"><a
                                    href="{{ route('frontend.terms-condition') }}">{{ __('messages.footer.terms_conditions') }}</a>
                            </li>
                        @endif
                        @if (checkCustomPage('imprint'))
                            <li class="me-3"><a
                                    href="{{ route('frontend.imprint') }}">{{ __('messages.footer.imprint') }}</a></li>
                        @endif
                        @if (checkCustomPage('right-of-withdrawal'))
                            <li class="me-3"><a
                                    href="{{ route('frontend.right-of-withdrawal') }}">{{ __('messages.footer.right-of-withdrawal') }}</a>
                            </li>
                        @endif
                        @if (checkCustomPage('general-terms-and-conditions'))
                            <li class="me-3">
                                <a href="{{ route('frontend.general-terms-and-conditions') }}">
                                    {{ __('messages.footer.general-terms-and-conditions') }}
                                </a>
                            </li>
                        @endif
                        <li class="me-3"><a href="{{ route('frontend.faq') }}">{{ __('messages.nav.faq') }}</a></li>
                        @if (checkCustomPage('data-protection-declaration'))
                            <li class="me-3">
                                <a href="{{ route('frontend.data-protection-declaration') }}">
                                    {{ __('messages.footer.data-protection-declaration') }}
                                </a>
                            </li>
                        @endif
                        @if (checkCustomPage('shipping-conditions'))
                            <li class="me-3">
                                <a href="{{ route('frontend.shipping-conditions') }}">
                                    {{ __('messages.footer.shipping-conditions') }}
                                </a>
                            </li>
                        @endif
                        @if (checkCustomPage('returns'))
                        <li class="me-3">
                            <a href="{{ route('frontend.returns') }}">
                                {{ __('messages.footer.returns') }}
                            </a>
                        </li>
                    @endif
                    </ul>
                </div>
                <div class="copyright mt-3 mb-3 mb-sm-0">
                    <p class="m-0">© 2024 Venmeo.de {{ __('messages.footer.rights_reserved') }}.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ======================= footer end ============================ -->
