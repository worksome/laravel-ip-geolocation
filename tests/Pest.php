<?php

use Worksome\IpGeolocation\Tests\TestCase;

uses(TestCase::class)->in('Feature');

// Test functions

function getResponseStubFilePath(string $path = null): string
{
    return __DIR__ . "/stubs/{$path}";
}
