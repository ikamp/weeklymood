@component('mail::message')
Hi!<br>
Welcome to our family. :)

@component('mail::button', ['url' => 'www.weekly.com/registration/{{$token}}', 'color' => 'blue'])
    Activate your account, here!
@endcomponent

Thanks,<br>
Weekly Mood Team
@endcomponent