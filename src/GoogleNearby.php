<?php

namespace Hilioski\NearbyDistanceScore;

use Exception;
use GuzzleHttp\Client;
use Hilioski\NearbyDistanceScore\Contracts\GoogleNearbyContract;

class GoogleNearby implements GoogleNearbyContract
{
    /** @var string */
    private $apiUrl = 'https://maps.googleapis.com/maps/api/place/nearbysearch/';

    /** @var */
    private $apiKey;

    /**
     * GoogleNearby constructor.
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
    public function getNearbyLocations(float $latitude, float $longitude, int $radius, int $maxResults = 20, array $optionalParameters = []): array
    {
        // ToDo: Pagination implementation if $maxResults > 20 (issue with 'pagetoken' param | 2-3 seconds needed between requests!)
        $client = new Client();


        try {
            $response = $client->get($this->apiUrl, [
                'query' => [
                        'key'       => $this->getApiKey(),
                        'location'  => $latitude . ',' . $longitude,
                        'radius'    => $radius,
                    ] + $optionalParameters,
            ]);

            $statusCode = $response->getStatusCode();

            $responseData = json_decode($response->getBody()->getContents(), true);

            if (200 === $statusCode && $responseData['status'] === "OK") {
                return $responseData['results'];
            }

            return [];
        } catch (Exception $e) {
            return [];
        }
    }
}
