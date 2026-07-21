<?php

namespace App\Notifications;

use App\Models\Training;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
    protected $id_training;
    protected $id_pelatihan;
    protected $user;
    protected $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $id_training, $id_pelatihan, $message)
    {
        $this->user = $user;
        $this->id_training = $id_training;
        $this->id_pelatihan = $id_pelatihan;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
   public function toMail(object $notifiable): MailMessage
    {
        $pelatihan = Training::where('id',$this->id_pelatihan)->first();
        $user = User::where('id', $this->user)->first();
        return (new MailMessage)
        ->subject('Pendaftaran Kelas ' . $pelatihan->name)
        ->greeting('Halo '. $user->username. '!') 
        ->line('Anda telah mendaftar pada Kelas ' . $pelatihan->name)
        ->line('Tim kami akan segera menghubungi Anda untuk proses selanjutnya. <br/> 
        Mohon segera tindak lanjuti pesan dari tim kami. <br/>
        Apabila Anda mengalami kesulitan atau punya pertanyaan bisa Anda sampaikan kepada tim kami. <br/>
        ')
        ->salutation('Salam Hormat, Arsa Training')
        ->markdown('vendor.notifications.email', [
            'pelatihan' => $pelatihan,
             // Path to your custom icon
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
            return [
            'user_id' => $this->user,
            'training_id'=> $this->id_training,
            'pelatihan' => $this->id_pelatihan,
            'message' => $this->message
        ];
    }
}
