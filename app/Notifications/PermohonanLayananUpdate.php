<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PermohonanLayananUpdate extends Notification
{
    use Queueable;

    protected $permohonan;
    /**
     * Create a new notification instance.
     */
    public function __construct($permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'permohonan_id' => $this->permohonan->id,
            'status' => $this->getAktivitas($this->permohonan->statuses),
            'keterangan' => $this->getKeterangan($this->permohonan->statuses),
        ];
    }

    private function getAktivitas($datas)
    {
        foreach ($datas as $item) {
            switch ($item->aktivitas) {
                case 1:
                    return 'Permohonan Diterima';
                    break;
                case 2:
                    return 'Permohonan Diproses';
                    break;
                case 3:
                    return 'Permohonan Dikembalikan';
                    break;
                case 4:
                    return 'Permohonan Selesai';
                    break;
                default:
                    return 'Permohonan Baru';
                    break;
            }
        }
    }

    private function getKeterangan($datas)
    {
        foreach ($datas as $item) {
            return $item->keterangan;
        }
    }
}
