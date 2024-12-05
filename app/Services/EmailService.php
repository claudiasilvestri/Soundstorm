<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadNotificationMail;

class EmailService
{
    public static function sendDownloadNotification($user, $fileName)
    {
        Mail::to($user->email)->send(new DownloadNotificationMail($user->name, $fileName));
    }
}
