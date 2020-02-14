<?php

namespace Hilioski\NearbyDistanceScore\Contracts;

interface GoogleGeoCodingContract
{
    /**
     * Convert address to latitude & longitude
     *
     * API Docs: https://developers.google.com/maps/documentation/geocoding/intro
     *
     * @param string $address
     * @param array  $optionalParameters
     *
     * @return array
     */
    public function geoCodeAddress(string $address, array $optionalParameters): array;
}
