@component('mail::message')
Hi!<br>

@component('mail::button', ['url' => $url, 'color' => 'blue'])
    Invite us!
@endcomponent

Thanks,<br>
Weekly Mood Team
@endcomponent