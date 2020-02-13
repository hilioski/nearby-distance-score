# Calculate nearby POI distance and score

## Requirements

- PHP >= 7.1.3
- Laravel >= 5.5.*

## Installation

Require this package with composer.

```bash
composer require hilioski/nearby-distance-score
```

To publishes config `config/nearby-distance-score.php`, use command:

```bash
php artisan vendor:publish --provider="Hilioski\NearbyDistanceScore\Providers\NearbyDistanceScoreServiceProvider"
```

Read more about generating Google Maps API Key [here.](https://developers.google.com/maps/documentation/distance-matrix/get-api-key)

```bash
GOOGLE_MAPS_API_KEY=api_key
```

## Usage

```php
// Use Facades
use Hilioski\NearbyDistanceScore\Facades\GoogleNearby;
use Hilioski\NearbyDistanceScore\Facades\GoogleDistance;

$nearbyPOI = GoogleNearby::getNearbyLocations($latitude, $longitude, $radius, $maxResults, $optionalParameters);
$distance  = GoogleDistance::calculate($origins, $destinations);

// Use Helper Function
$nearbyPOI = google_nearby($latitude, $longitude, $radius, $maxResults, $optionalParameters);
$distance  = google_distance($origins, $destinations);
```

## Credits

- [Hristian Ilioski](https://github.com/hilioski)

For more info, please visit:
- https://developers.google.com/maps/documentation/distance-matrix/intro
- https://developers.google.com/places/web-service/search#PlaceSearchRequests
- https://www.walkscore.com/professional/api.php
