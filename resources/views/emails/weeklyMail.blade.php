@component('mail::message')
Hi!<br>
Today is Monday. So you should select your mood. :)

@component('mail::button', ['url' => $url, 'color' => 'green'])
    GO!
@endcomponent

Thanks,<br>
Weekly Mood Team
@endcomponent