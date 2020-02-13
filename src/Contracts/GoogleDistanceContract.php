<?php

namespace Hilioski\NearbyDistanceScore\Contracts;

interface GoogleDistanceContract
{
    /**
     * Calculate distance from origins to destinations.
     *
     * API Docs: https://developers.google.com/maps/documentation/distance-matrix/intro
     *
     * @param string $origins
     * @param string $destinations
     * @param array  $optionalParameters
     *
     * @return array
     */
    public function calculate(string $origins, string $destinations, array $optionalParameters): array;
}
