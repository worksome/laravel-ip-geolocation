<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation\Drivers;

use Worksome\IpGeolocation\Contracts\Driver;
use Worksome\IpGeolocation\DataValues\Location;

class NullDriver implements Driver
{
    private Location|null $location;

    public function location(string $ipAddress): Location|null
    {
        return $this->location ?? null;
    }

    public function fakeLocation(Location|null $location): self
    {
        $this->location = $location;

        return $this;
    }
}
