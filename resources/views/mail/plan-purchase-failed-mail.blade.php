@component('mail::message')
# {{ $mailData['title'] }}

Hello {{ $mailData['data']['user_name'] }},<br>
We regret to inform you that your recent attempt to purchase the **{{ $mailData['data']['plan_name'] }}** Plan has failed.

Please try again or [contact our support team]({{ $mailData['data']['details'] }}) for further assistance.
Thanks,<br>
{{ config('app.name') }}
@endcomponent
