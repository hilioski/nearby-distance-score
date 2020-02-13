<?php

namespace Hilioski\NearbyDistanceScore\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleDistance extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'google-distance';
    }
}
