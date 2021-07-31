<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer_message)
    {
        $this->customer_message = $customer_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Customer Message')->view('emails.MessageMail'); // resources/views/emails/MessageMail.blade.php
    }
}
