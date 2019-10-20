<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PleaseConfirmYourEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The user associated with the email.
     *
     * @var \App\Scorer
     */
    public $scorer;

    /**
     * Create a new mailable instance.
     *
     * @param \App\Scorer $scorer
     */
    public function __construct($scorer)
    {
        $this->scorer = $scorer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->scorer);
        return $this->markdown('emails.confirm-email');
    }
}
