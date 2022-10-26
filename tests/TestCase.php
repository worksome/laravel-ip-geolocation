<?php

namespace Worksome\IpGeolocation\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Worksome\IpGeolocation\IpGeolocationServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            IpGeolocationServiceProvider::class,
        ];
    }
}
