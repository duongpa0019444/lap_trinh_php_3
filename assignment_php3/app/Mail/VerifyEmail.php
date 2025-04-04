<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Mailable
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    //gửi
    public function build()
    {
        $link = URL::temporarySignedRoute(
            'user.verify', now()->addMinutes(60), ['token' => $this->user->activation_token]
        );

        return $this->subject('Xác nhận tài khoản')
                    ->view('verify')
                    ->with(['link' => $link]);
    }



}
