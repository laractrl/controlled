<?php

namespace Controlled\Http\Request;

use Controlled\helpers\Path;
use Illuminate\Support\Facades\Http;

class Handler extends Http
{
    private $headers = [];
    private $host = '';
    private $apiUrl = 'api/v1';

    public function __construct()
    {
        $this->setDefultHeaders();
        $this->setHost();
    }

    public static function verifie()
    {
        $host = self::$host;
        $apiUrl = self::$apiUrl;
        return self::withHeaders(self::$headers)->get("https://`{$host}`/{$apiUrl}/verifie");
    }

    public function setDefultHeaders()
    {
        $app_key = file_get_contents(Path::getTestKey());

        $this->headers = [
            'app' => $app_key,
            'ip' => request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null),
            'domain' => request()->getHost()
        ];
        return $this;
    }

    public function setHost()
    {
        $this->host = 'laractrl.com';
        return $this;
    }
}
