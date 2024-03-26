<?php

namespace App\Mail;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Declaration of email variables to be used when sending email
     */
    public array $contact;
  
    /**
     * Create a new message instance.
     */
    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'FROM ' . Str::upper(env('APP_NAME')) . ': ' . $this->contact['subject'],
            from: new Address($this->contact['email'], $this->contact['name']),
            replyTo: [
              $this->contact['email'],
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'emails.contact_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
