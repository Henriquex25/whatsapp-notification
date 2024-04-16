<?php

namespace App\Services\Whatsapp\Notifications;

use App\Services\Whatsapp\NotificationChannels\WhatsappNotificationChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\Middleware\WithoutOverlapping;

class WhatsappMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $tries = 0;

    public function __construct(public string $message, public int $loggedUserId)
    {
        $this->through([
            new WithoutOverlapping($this->loggedUserId),
            new RateLimited('bulkMessagesWhatsApp'),
        ]);
    }

    public function via(object $notifiable): array
    {
        return [
            WhatsappNotificationChannel::class,
        ];
    }
}
