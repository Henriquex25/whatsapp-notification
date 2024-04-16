<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Whatsapp\WhatsappService;
use Illuminate\Http\Client\PendingRequest;

class WhatsappNotificationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('WhatsappService', function () {
            $client = new PendingRequest();

            return new WhatsappService($client);
        });
    }

    public function boot(): void
    {
        //
    }
}