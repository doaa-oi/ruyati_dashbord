<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class HelpRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $blindId; // معرف الكفيف
    private $blindName; // اسم الكفيف

    public function __construct($blindId, $blindName)
    {
        $this->blindId = $blindId;
        $this->blindName = $blindName;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'BlindId' => (string)$this->blindId, // تأكد من سلامة القيمة هنا
            'BlindName' => $this->blindName,
            // أضف أي بيانات إضافية حسب الحاجة
        ];
    }
}
