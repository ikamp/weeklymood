<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationMailService extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

            ->markdown('emails.registrationMail');
    }
}
