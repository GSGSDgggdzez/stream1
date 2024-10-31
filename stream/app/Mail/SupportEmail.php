<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Support Request',
            from: $this->formData['email']
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.support',
            with: [
                'firstName' => $this->formData['First_name'],
                'lastName' => $this->formData['Last_name'],
                'email' => $this->formData['email'],
                'message' => $this->formData['message']
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
