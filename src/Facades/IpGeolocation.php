<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \Worksome\IpGeolocation\IpGeolocation
 */
class IpGeolocation extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Worksome\IpGeolocation\IpGeolocation::class;
    }
}
