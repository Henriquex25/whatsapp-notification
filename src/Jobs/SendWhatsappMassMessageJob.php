<?php

namespace App\Services\Whatsapp\Jobs;

use App\Models\User;
use App\Notifications\WhatsappMessageNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWhatsappMassMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected array $userIds, protected string $message, int $loggedUserId)
    {
        //
    }

    public function handle(): void
    {
        User::query()
            ->withoutDeveloper()
            ->whereIn('id', $this->userIds)
            ->get(['mobile'])
            ->each
            ->notify(new WhatsappMessageNotification($this->message, $this->loggedUserId));
    }
}
