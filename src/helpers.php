<?php

use Hilioski\NearbyDistanceScore\Facades\GoogleNearby;
use Hilioski\NearbyDistanceScore\Facades\GoogleDistance;

if (!function_exists('google_nearby')) {
    /**
     * @author hilioski
     *
     * @param float $latitude
     * @param float $longitude
     * @param int   $radius
     * @param int   $maxResults
     * @param array $optionalParameters
     *
     * @return array
     */
    function google_distance(float $latitude, float $longitude, int $radius, int $maxResults = 20, array $optionalParameters = [])
    {
        return GoogleNearby::getNearbyLocations($latitude, $longitude, $radius, $maxResults, $optionalParameters);
    }
}


if (!function_exists('google_distance')) {
    /**
     * @author hilioski
     *
     * @param string $origins
     * @param string $destinations
     * @param array  $optionalParameters
     *
     * @return array
     */
    function google_distance(string $origins, string $destinations, array $optionalParameters = [])
    {
        return GoogleDistance::calculate($origins, $destinations, $optionalParameters);
    }
}
