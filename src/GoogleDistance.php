<?php

namespace Hilioski\NearbyDistanceScore;

use Exception;
use GuzzleHttp\Client;
use Hilioski\NearbyDistanceScore\Contracts\GoogleDistanceContract;

class GoogleDistance implements GoogleDistanceContract
{
    /** @var string */
    private $apiUrl = 'https://maps.googleapis.com/maps/api/distancematrix/';

    /** @var */
    private $apiKey;

    /** @var */
    private $origins;

    /** @var */
    private $destinations;

    /**
     * GoogleDistance constructor.
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
     * Get origins.
     *
     * @return mixed
     */
    public function getOrigins()
    {
        return $this->origins;
    }

    /**
     * Set origins.
     *
     * @param $origins
     *
     * @return \Hilioski\NearbyDistanceScore\GoogleDistance
     */
    public function setOrigins($origins): self
    {
        $this->origins = $origins;

        return $this;
    }

    /**
     * Get destinations.
     *
     * @return mixed
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    /**
     * Set destinations.
     *
     * @param $destinations
     *
     * @return \Hilioski\NearbyDistanceScore\GoogleDistance
     */
    public function setDestinations($destinations): self
    {
        $this->destinations = $destinations;

        return $this;
    }

    /**
     * Calculate distance from origins to destinations.
     *
     * @param string $origins
     * @param string $destinations
     * @param array  $optionalParameters
     *
     * @return array
     */
    public function calculate(string $origins, string $destinations, array $optionalParameters = []): array
    {
        $client = new Client();

        try {
            $response = $client->get($this->apiUrl, [
                'query' => [
                    'key'          => $this->getApiKey(),
                    'origins'      => $origins,
                    'destinations' => $destinations,
                ] + $optionalParameters,
            ]);

            $statusCode = $response->getStatusCode();

            $responseData = json_decode($response->getBody()->getContents(), true);

            if ($statusCode === 200 && $responseData['status'] === "OK") {
                return $responseData;
            }

            return [];
        } catch (Exception $e) {
            return [];
        }
    }
}
