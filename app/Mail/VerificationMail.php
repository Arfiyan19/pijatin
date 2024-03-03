<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $verificationCode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode; //ini yang diubah
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //roolback status verification
        return $this->markdown('emails.verification')
            ->subject('Verifikasi Email');
        // return $this->view('view.name');
    }
}
