<?php

namespace Hilioski\NearbyDistanceScore\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleNearby extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'google-nearby';
    }
}
