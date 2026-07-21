<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCodeResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    private $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $data = $this->details;
        return $this->subject("Arsatraining recovery code")->view('otp_code_recovery', $data);
    }
}
