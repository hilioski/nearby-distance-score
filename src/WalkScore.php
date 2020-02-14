<?php

namespace Hilioski\NearbyDistanceScore;

use Exception;
use GuzzleHttp\Client;
use Hilioski\NearbyDistanceScore\Contracts\WalkScoreContract;

class WalkScore implements WalkScoreContract
{
    /** @var string */
    private $apiUrl = 'http://api.walkscore.com/score';

    /** @var */
    private $apiKey;

    /** @var */
    private $outputFormat;

    /**
     * WalkScore constructor.
     *
     * @param $apiKey
     * @param $output (json or xml)
     */
    public function __construct($apiKey, $output = 'json')
    {
        $this->apiKey = $apiKey;
        $this->outputFormat = $output;
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
     * Get outputFormat.
     *
     * @return string
     */
    public function getOutputFormat()
    {
        return $this->outputFormat;
    }

    /**
     * Get score from WalkScore API
     *
     * @param float  $latitude
     * @param float  $longitude
     * @param string $address
     * @param array  $optionalParameters
     *
     * @return array
     */
    public function getScore(float $latitude, float $longitude, string $address, array $optionalParameters = []): array
    {
        $client = new Client();

        try {
            $response = $client->get($this->apiUrl, [
                'query' => [
                    'wsapikey' => $this->getApiKey(),
                    'format'   => $this->getOutputFormat(),
                    'lat'      => $latitude,
                    'lon'      => $longitude,
                    'address'  => $address,
                ] + $optionalParameters,
            ]);

            $statusCode = $response->getStatusCode();

            $responseData = json_decode($response->getBody()->getContents(), true);

            if ($statusCode === 200 && $responseData['status']) {
                return $responseData;
            }

            return [];
        } catch (Exception $e) {
            return [];
        }
    }
}
