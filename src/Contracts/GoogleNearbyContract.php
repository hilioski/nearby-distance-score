<?php

namespace Hilioski\NearbyDistanceScore\Contracts;

interface GoogleNearbyContract
{
    /**
     * Get nearby locations.
     *
     * API Docs: https://developers.google.com/places/web-service/search#PlaceSearchRequests
     *
     * @param float $latitude
     * @param float $longitude
     * @param int   $radius
     * @param int   $maxResults
     * @param array $optionalParameters
     *
     * @return array
     */
    public function getNearbyLocations(float $latitude, float $longitude, int $radius, int $maxResults, array $optionalParameters = []): array;
}
