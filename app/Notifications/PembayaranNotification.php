<?php

namespace App\Notifications;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PembayaranNotification extends Notification
{
    use Queueable;
    protected $id_training;
    protected $user;
    protected $id_pembayaran;
    protected $message;
    public function __construct($user, $id_training, $id_pembayaran, $message)
    {
        $this->user = $user;
        $this->id_training = $id_training;
        $this->id_pembayaran = $id_pembayaran;
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $pembayaran =  Pembayaran::select('trainings.name')->join('pelatihans', 'pelatihans.id', '=', 'pembayarans.pelatihan_id')->join('trainings','trainings.id','=','pelatihans.training_id')->where('pembayarans.id', $this->id_pembayaran)->first();
        $user = User::where('id', $this->user)->first();
        return (new MailMessage)
        ->subject('Pembayaran '. $pembayaran->name ) 
        ->greeting('Halo '. $user->username. '!') 
        ->line('Anda telah mendaftar pada Kelas '. $pembayaran->name)
        ->line('Pembayaran telah berhasil kami konfirmasi')
        ->salutation('Salam Hormat, Arsa Training')
        ->markdown('vendor.notifications.email', [
            'pembayaran' => $pembayaran,
        ]);
    }
                   
    public function toArray(object $notifiable): array
    {
        return [
            'user_id'=> $this->user,
            'training_id'=> $this->id_training,
            'pembayaran'=> $this->id_pembayaran,
            'message'=> $this->message,
        ];
    }
}
