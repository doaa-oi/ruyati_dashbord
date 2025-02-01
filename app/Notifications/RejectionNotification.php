<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $volunteerId; // معرف الكفيف
    private $volunteerName; // اسم الكفيف
    public function __construct($volunteerId,$volunteerName)
    {
        $this->volunteerId = $volunteerId;
        $this->volunteerName = $volunteerName;
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




    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'VolunteerId' =>(string)$this->volunteerId,
            'VolunteerName' =>$this->volunteerName,
        ];
    }
}
