<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

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
            subject: 'Il tuo brano è piaciuto!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.downloadNotificationMail'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

class DownloadNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $fileName;

    public function __construct($user, $fileName)
    {
        $this->user = $user;
        $this->fileName = $fileName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@soundstorm.it'),
            subject: 'Your File Download'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.download-notification',
            with: [
                'userName' => $this->user->name,
                'fileName' => $this->fileName,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
