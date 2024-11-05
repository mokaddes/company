@component('mail::message')
# {{ $mailData['title'] }}

## Plan Details
- **Plan Name:** {{ $mailData['data']['plan_name'] }}
- **Plan Duration (in days):** {{ $mailData['data']['plan_day'] }} days
- **Plan Price:** {{ $mailData['data']['plan_price'] }} {{getDefaultCurrencySymbol()}} 

@component('mail::button', ['url' => $mailData['data']['details']])
View Transaction Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
