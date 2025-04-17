<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public function __construct($mailData) {
        $this->mailData = $mailData;
    }

    public function envelope() {
        return new Envelope(
            subject: $this->mailData['subject'],
        );
    }

    public function content() {
        return new Content(
            view: 'email.order',
        );
    }

    public function attachments() {
        return [];
    }
}
