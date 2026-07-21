<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UploadNotification extends Notification
{
    use Queueable;
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $message =  "Anda berhasil mengunggah berkas";
        return [
            'user_id' => $this->user,
            'message' => $message
        ];
    }
}
