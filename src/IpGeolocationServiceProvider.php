<?php

declare(strict_types=1);

namespace Worksome\IpGeolocation;

use Illuminate\Foundation\Console\AboutCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IpGeolocationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ip-geolocation')
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        $this->extendAboutCommand();
    }

    private function extendAboutCommand(): void
    {
        if (! config('ip-geolocation.features.about_command', true)) {
            return;
        }

        $driver = config('ip-geolocation.default');

        AboutCommand::add(
            'Multi-Factor Authentication (MFA)',
            fn () => [
                'Driver' => $driver ?? 'null',
            ]
        );
    }
}
