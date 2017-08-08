@component('mail::message')
Hi!<br>

@component('mail::button', ['url' => 'weekly.com/#/password-reset', 'color' => 'blue'])
    Change your password!
@endcomponent

Thanks,<br>
Weekly Mood Team
@endcomponent