<?php

namespace Controlled\Http\Request;

use Controlled\helpers\Path;
use Illuminate\Support\Facades\Http;

class Handler
{
    private $headers = [];
    private $host = '';
    private $apiUrl = 'api/v1';

    public function __construct()
    {
        $this->setDefultHeaders();
        $this->setHost();
    }

    public function verifie()
    {
        $host = $this->host;
        $apiUrl = $this->apiUrl;
        return Http::withHeaders($this->headers)->get("https://{$host}/{$apiUrl}/verifie");
    }

    public function setDefultHeaders()
    {
        $this->headers = [
            'app' => file_get_contents(Path::getTestKey()),
            'ip' => request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null),
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
