<?php

declare(strict_types=1);

use Worksome\IpGeolocation\DataValues\Location;
use Worksome\IpGeolocation\Drivers\NullDriver;

it('can retrieve the location with the Null driver', function () {
    $location = new Location(
        zipcode: '10001',
        city: 'New York',
        country: 'United States',
    );

    $driver = (new NullDriver())->fakeLocation($location);

    $location = $driver->location('2606:4700:4700::1111');

    expect($location)->toBe($location);
});

it('can retrieve null when no location is provided to the Null driver', function () {
    $driver = new NullDriver();

    $location = $driver->location('2606:4700:4700::1111');

    expect($location)->toBeNull();
});
