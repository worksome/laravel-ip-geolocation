<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation\DataValues;

class Location
{
    public function __construct(
        public readonly string|null $address = null,
        public readonly string|null $zipcode = null,
        public readonly string|null $city = null,
        public readonly string|null $state = null,
        public readonly string|null $country = null,
        public readonly string|null $province = null,
    ) {
    }
}
