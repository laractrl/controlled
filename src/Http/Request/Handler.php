<?php

namespace Controlled\Http\Request;

use Controlled\helpers\Path;
use Illuminate\Support\Facades\Http;

class Handler extends Http
{
    private static $headers = [];
    private static $host = '';
    private static $apiUrl = 'api/v1';

    public function __construct()
    {
        self::setDefultHeaders();
        self::setHost();
    }

    public static function verifie()
    {
        $host = self::$host;
        $apiUrl = self::$apiUrl;
        return self::withHeaders(self::$headers)->get("https://`{$host}`/{$apiUrl}/verifie");
    }

    public static function setDefultHeaders()
    {
        $app_key = file_get_contents(Path::getTestKey());

        self::$headers = [
            'app' => $app_key,
            'ip' => request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null),
            'domain' => request()->getHost()
        ];
    }

    public static function setHost()
    {
        self::$host = 'laractrl.com';
    }
}
