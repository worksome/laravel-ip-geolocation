<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation\Drivers;

use Illuminate\Support\Arr;
use Worksome\IpGeolocation\Contracts\Driver;
use Worksome\IpGeolocation\DataValues\Location;
use Worksome\IpGeolocation\Services\Ip2Loc\Client;

class Ip2LocDriver implements Driver
{
    public function __construct(private readonly Client $client)
    {
    }

    public function location(string $ipAddress): Location|null
    {
        $location = $this->client->location($ipAddress);

        return new Location(
            zipcode: Arr::get($location, 'country.zip_code'), // @phpstan-ignore-line
            city: Arr::get($location, 'city'), // @phpstan-ignore-line
            country: Arr::get($location, 'country.name'), // @phpstan-ignore-line
        );
    }
}
