<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationVerification extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from (env('MAIL_ADDRESS'));
        $this->subject = 'Dakay Construction Registration Verification';

        $this->data['activation_link'] = route('web.activation_url', [
            'code' => $this->data['activation_code'],
            'email' => $this->data['email'],
            'password' => $this->data['password'],
        ]);

        return $this->view('emails.registration')
            ->with($this->data);
    }
}
