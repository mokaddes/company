@php
    $setting = getSetting();
@endphp
<footer class="main-footer text-center">
    © {{ date('Y') }} {{$setting->site_name}} {{__('messages.footer.rights_reserved')}}
</footer>
