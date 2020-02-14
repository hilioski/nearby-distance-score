<?php

namespace Hilioski\NearbyDistanceScore\Contracts;

interface WalkScoreContract
{
    /**
     * Walk Score API
     *
     * API Docs: https://www.walkscore.com/professional/api.php
     *
     * @param float  $latitude
     * @param float  $longitude
     * @param string $address
     * @param array  $optionalParameters
     *
     * @return array
     */
    public function getScore(float $latitude, float $longitude, string $address, array $optionalParameters): array;
}
