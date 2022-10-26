<?php

declare(strict_types=1);

use Illuminate\Http\Client\Factory;
use Worksome\IpGeolocation\DataValues\Location;
use Worksome\IpGeolocation\Drivers\Ip2LocDriver;
use Worksome\IpGeolocation\Services\Ip2Loc\Client;

it('can retrieve the location with the IP2Loc driver', function () {
    $factory = new Factory();

    $factory->fake([
        '/aaaabbbbccccddddeeeeffff1111/2606:4700:4700::1111' => json_decode((string) file_get_contents(
            getResponseStubFilePath('IP2Loc/ok-response.json')
        ), true)
    ]);

    $client = new Client($factory, 'aaaabbbbccccddddeeeeffff1111');

    $driver = new Ip2LocDriver($client);

    $location = $driver->location('2606:4700:4700::1111');

    expect($location)->toBeInstanceOf(Location::class)
        ->country->toBe('United States');
});
