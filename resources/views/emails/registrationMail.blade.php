@component('mail::message')
Hi!<br>
Welcome to our family. :)

@component('mail::button', ['url' => $url, 'color' => 'blue'])
    Activate your account, here!
@endcomponent

Thanks,<br>
Weekly Mood Team
@endcomponent