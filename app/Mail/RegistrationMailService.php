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
        $address = 'busragumusel@gmail.com';

        $name = 'Busra Gumusel';

        $subject = 'WeeklyMood';

        return $this->from($address, $name)

            ->subject($subject)

            ->markdown('emails.registrationMail', ['token' => $this->registration->token]);
    }
}
