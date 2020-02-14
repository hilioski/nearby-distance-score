<?php

namespace Hilioski\NearbyDistanceScore;

use Exception;
use GuzzleHttp\Client;
use Hilioski\NearbyDistanceScore\Contracts\GoogleGeoCodingContract;

class GoogleGeoCoding implements GoogleGeoCodingContract
{
    /** @var string */
    private $apiUrl = 'https://maps.googleapis.com/maps/api/geocode/';

    /** @var */
    private $apiKey;

    /**
     * GoogleGeoCode constructor.
     *
     * @param $apiKey
     * @param $output (json or xml)
     */
    public function __construct($apiKey, $output = 'json')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl.= $output;
    }

    /**
     * Get API_KEY.
     *
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

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
    public function geoCodeAddress(string $address, array $optionalParameters = []): array
    {
        $client = new Client();

        try {
            $response = $client->get($this->apiUrl, [
                'query' => [
                        'key'     => $this->getApiKey(),
                        'address' => $address,
                    ] + $optionalParameters,
            ]);

            $statusCode = $response->getStatusCode();

            $responseData = json_decode($response->getBody()->getContents(), true);

            if ($statusCode === 200 && $responseData['status'] === "OK") {
                return $responseData['results'];
            }

            return [];
        } catch (Exception $e) {
            return [];
        }
    }
}
