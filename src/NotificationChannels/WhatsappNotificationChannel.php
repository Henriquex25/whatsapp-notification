<?php

declare(strict_types = 1);

namespace App\Services\Whatsapp\NotificationChannels;

use App\Services\Whatsapp\Facade\Whatsapp;
use Illuminate\Notifications\Notification;

class WhatsappNotificationChannel
{
    public function send(object $notifiable, Notification $notification)
    {
        Whatsapp::setLoggedUserId($notification->loggedUserId)
            ->sendMessage(
                phone: $notifiable->mobile,
                message: $notification->message
            )->execute();

        $interval = random_int(1, 3);

        sleep($interval);
    }
}
