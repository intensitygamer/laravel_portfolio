<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

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
        $this->subject = trans('messages.User Password Reset');

        $this->data['reset_link'] = route('user.password_reset', [
            'token' => $this->data['token'],
            'email' => $this->data['email']
        ]);

        return $this->view('emails.user.password_reset')
            ->with($this->data);
    }
}
