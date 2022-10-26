<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation\Services\Ip2Loc;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Worksome\IpGeolocation\DataValues\Location;

class Client
{
    public const BASE_URL = 'https://api.ip2loc.com';

    public function __construct(
        private readonly Factory $client,
        private readonly string $token,
    ) {
    }

    public function location(string $ipAddress): array|null
    {
        // @phpstan-ignore-next-line
        return $this->client()->get(self::BASE_URL."/{$this->token}/{$ipAddress}")->throw()->json('location');
    }

    private function client(): PendingRequest
    {
        return $this
            ->client
            ->acceptJson()
            ->asJson();
    }
}
