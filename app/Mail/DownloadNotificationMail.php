<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class DownloadNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $trackTitle;

    public function __construct($username, $trackTitle)
    {
        $this->username = $username;
        $this->trackTitle = $trackTitle; 
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@soundstorm.it'),
            subject: 'Il tuo brano è piaciuto!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.downloadNotificationMail',
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
