<?php

declare(strict_types = 1);

namespace App\Services\Whatsapp\Facade;

use Illuminate\Support\Facades\Facade;

class Whatsapp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'WhatsappService';
    }
}
