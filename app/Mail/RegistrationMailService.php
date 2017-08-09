<?php

namespace App\Mail;

use App\Model\Registration;
use App\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationMailService extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $registration;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Registration $registration)
    {
        $this->user = $user;
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'weeklymood.ikamp@gmail.com';

        $name = 'WeeklyMood';

        $subject = 'Welcome';

        $token = $this->registration->token;

        $url = 'weekly.com/#/registration/'.$token;

        return $this->from($address, $name)
            ->subject($subject)
            ->markdown('emails.registrationMail', ['url'=> $url]);
    }
}
