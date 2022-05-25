<?php

namespace Controlled\Http\Request;

use Controlled\helpers\Path;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Handler
{
    private $headers = [];
    private $host = '';
    private $apiUrl = 'api/v1';
    private $seconds = 3;

    public function __construct()
    {
        $this->setDefultHeaders();
        $this->setHost();
    }

    public function verifie()
    {
        $host = $this->host;
        $apiUrl = $this->apiUrl;

        $response = Cache::remember('request_verifie', $this->seconds, function () use ($host, $apiUrl) {
            return Http::withHeaders($this->headers)->get("https://{$host}/{$apiUrl}/verifie");
        });

        return $response;
    }

    public function setDefultHeaders()
    {
        $this->headers = [
            'app' => file_get_contents(Path::getTestKey()),
            'ip' => appIP(),
            'domain' => appDomain()
        ];
        return $this;
    }

    public function setHost()
    {
        $this->host = 'laractrl.com';
        return $this;
    }
}
