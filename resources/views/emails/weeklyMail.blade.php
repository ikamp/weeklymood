@component('mail::message')
Hi!<br>
Today is Monday. How was your last week? :)

@component('mail::button', ['url' => 'weekly.com/#/moodcontent', 'color' => 'green'])
    GO!
@endcomponent

Thanks,<br>
Weekly Mood Team
@endcomponent