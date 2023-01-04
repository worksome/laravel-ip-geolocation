<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Manager;
use Worksome\IpGeolocation\Contracts\Driver;
use Worksome\IpGeolocation\DataValues\Location;
use Worksome\IpGeolocation\Drivers\Ip2LocDriver;
use Worksome\IpGeolocation\Drivers\NullDriver;
use Worksome\IpGeolocation\Services\Ip2Loc\Client;

/**
 * @method Driver   driver(string|null $driver = null)
 * @method Location location(string $ipAddress)
 */
class IpGeolocation extends Manager
{
    public function getDefaultDriver(): string
    {
        /** @phpstan-ignore-next-line */
        return $this->config->get('ip-geolocation.default') ?? 'null';
    }

    public function createNullDriver(): NullDriver
    {
        return new NullDriver();
    }

    public function createIp2locDriver(): Ip2LocDriver
    {
        /** @var array{token: string} $options */
        $options = $this->config->get('ip-geolocation.drivers.ip2loc');

        /** @var Factory $factory */
        $factory = $this->container->make(Factory::class);

        return new Ip2LocDriver(
            new Client(
                $factory,
                $options['token']
            )
        );
    }
}
