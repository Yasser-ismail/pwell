<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact_us_reply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $message;
    protected $replayMessage;

    public function __construct($user_message, $admin_message)
    {
        $this->message = $user_message;
        $this->replayMessage = $admin_message;



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage = $this->message;
        $replayMessage = $this->replayMessage;

        return $this->to($contactMessage->email)->
        view('backend.mails.replay-mail', compact('contactMessage', 'replayMessage'));    }
}
