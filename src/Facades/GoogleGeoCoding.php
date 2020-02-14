<?php

namespace Hilioski\NearbyDistanceScore\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleGeoCoding extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'google-geocoding';
    }
}
