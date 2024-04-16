<?php

declare(strict_types = 1);

namespace App\Services\Whatsapp;

use Illuminate\Http\Client\PendingRequest as Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class WhatsappService
{
    protected ?string $sessionName = null;
    protected string $method       = 'get';
    protected string $endPoint     = '';
    protected ?int $loggedUserId   = null;
    protected array $data          = [];
    protected static array $emojis = ['😀', '😁', '😂', '🙃', '🥲', '😉', '🤨', '😕', '😏', '🥲', '🤑', '🫣', '🤔', '😑', '🤚', '🙄', '🤥', '😌', '😔', '😪', '🤕', '🤢', '🥶',
        '🥵', '😎', '😡', '😠', '👋', '🤚', '✋', '🫷', '👌', '✌️', '🫰', '🤙', '👆', '👍', '👎', '🤜', '🤛', '🙌', '🫶', '🤲', '🤝', '🙏', '✍️', '💪', '👂', '🚗', '🏍️',
        '🚧', '🏗️', '⏳', '🕒', '🖊️', '📝', '🪪', '🔴', '🟠', '⚫', '🔵', '🏦', '🏢', '🌧️', '☂️', '☔', '🔥', '🚫', '⚠️', '✖️', '✅'
    ];

    public function __construct(protected Client $client)
    {
        $this->configure();

        $this->loggedUserId = Auth::id();
    }

    protected function configure(): void
    {
        $this->client->withHeaders(['Content-Type' => 'application/json']);

        $this->getBaseUrl();
    }

    protected function getBaseUrl(): void
    {
        $baseUrl = Config::get('services.whatsapp.base_url');
        $port    = Config::get('services.whatsapp.port');

        $this->client->baseUrl("{$baseUrl}:{$port}/api/");
    }

    protected function getSessionName(): void
    {
        $this->sessionName = Config::get('services.whatsapp.session_prefix') . 'userID_' . $this->loggedUserId;
    }

    public function setLoggedUserId(int $loggedUserId): self
    {
        $this->loggedUserId = $loggedUserId;

        return $this;
    }

    public static function getEmojis(): array
    {
        return self::$emojis;
    }

    protected function getToken(): void
    {
        $token = $this->generateToken();

        $this->client->withToken($token);
    }

    protected function generateToken(): ?string
    {
        $filename = $this->getFilename();
        $token    = '';

        if (File::exists($filename)) {
            return File::get($filename);
        }

        $this->getSessionName();

        $secretKey = Config::get('services.whatsapp.secret_key');
        $token     = $this->client->timeout(120)->post("{$this->sessionName}/{$secretKey}/generate-token")->collect()->get('token');

        $this->writeToken($token);

        return $token;
    }

    protected function writeToken(string $token): void
    {
        File::put($this->getFilename(), $token);
    }

    protected function getFilename(): string
    {
        return App::basePath('/whatsapp_tokens/') . $this->sessionName . ".txt";
    }

    public function checkConnectionSession(): self
    {
        $this->method   = 'get';
        $this->endPoint = '/check-connection-session';

        return $this;
    }

    public function startSession(): self
    {
        $this->method   = 'post';
        $this->endPoint = '/start-session';
        $this->data     = [
            'webhook'    => null,
            'waitQrCode' => true,
        ];

        return $this;
    }

    public function closeSession(): self
    {
        $this->method   = 'post';
        $this->endPoint = '/close-session';

        return $this;
    }

    public function logoutSession(): self
    {
        $this->method   = 'post';
        $this->endPoint = '/logout-session';

        return $this;
    }

    public function sendMessage(string $phone, string $message, bool $isGroup = false): self
    {
        $this->method   = 'post';
        $this->endPoint = '/send-message';
        $this->data     = [
            'phone'   => $this->resolvePhoneNumber($phone),
            'message' => $message,
            'isGroup' => $isGroup,
        ];

        return $this;
    }

    public function sendImageOrVideo(
        string $phone,
        string $fileName,
        string $path,
        ?string $message = null,
        bool $isGroup = false
    ): self {
        $this->method   = 'post';
        $this->endPoint = '/send-image';
        $this->data     = [
            'phone'    => $this->resolvePhoneNumber($phone),
            'isGroup'  => $isGroup,
            'filename' => $fileName,
            'path'     => $path,
            'caption'  => $message,
            'base64'   => '',
        ];

        return $this;
    }

    protected function resolvePhoneNumber(string $phoneNumber): string
    {
        return preg_replace('/[^0-9]/', '', trim($phoneNumber));
    }

    protected function resolveEndpoint(): string
    {
        $this->getSessionName();

        return $this->sessionName . $this->endPoint;
    }

    public function execute(): Response
    {
        $endpoint = $this->resolveEndpoint();

        $this->getToken();

        $response = $this->client->timeout(120)->{$this->method}($endpoint, $this->data);

        return $response;
    }
}
