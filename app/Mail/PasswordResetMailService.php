<?php

namespace App\Mail;

use App\Model\Registration;
use App\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetMailService extends Mailable
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
        $this->registration = $registration;
        $this->user = $user;
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

        $subject = 'Forgot Password';

        $token = $this->registration->token;

        $url = 'weekly.com/#/password/reset/'.$token;

        return $this->from($address, $name)

            ->subject($subject)

            ->markdown('emails.passwordResetMail', ['url' => $url]);
    }
}
