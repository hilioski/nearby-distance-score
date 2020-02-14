<?php

namespace Hilioski\NearbyDistanceScore\Facades;

use Illuminate\Support\Facades\Facade;

class WalkScore extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'walk-score';
    }
}
