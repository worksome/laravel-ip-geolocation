<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation\Contracts;

use Worksome\IpGeolocation\DataValues\Location;

interface Driver
{
    public function location(string $ipAddress): Location|null;
}
