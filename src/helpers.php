<?php

use Hilioski\NearbyDistanceScore\Facades\WalkScore;
use Hilioski\NearbyDistanceScore\Facades\GoogleNearby;
use Hilioski\NearbyDistanceScore\Facades\GoogleDistance;
use Hilioski\NearbyDistanceScore\Facades\GoogleGeoCoding;

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

if (!function_exists('google_geocoding')) {
    /**
     * @author hilioski
     *
     * @param string $address
     * @param array  $optionalParameters
     *
     * @return array
     */
    function geoCodeAddress(string $address, array $optionalParameters = [])
    {
        return GoogleGeoCoding::geoCodeAddress($address, $optionalParameters);
    }
}


if (!function_exists('walk_score')) {
    /**
     * @author hilioski
     *
     * @param float  $latitude
     * @param float  $longitude
     * @param string $address
     * @param array  $optionalParameters
     *
     * @return array
     */
    function walk_score(float $latitude, float $longitude, string $address, array $optionalParameters = [])
    {
        return WalkScore::getScore($latitude, $longitude, $address, $optionalParameters);
    }
}
