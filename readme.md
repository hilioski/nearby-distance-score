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

Read more about generating Google Maps API Key [here.](https://developers.google.com/maps/documentation/distance-matrix/get-api-key) and for Walk Score API [here.](https://www.walkscore.com/professional/api-sign-up.php)

```bash
GOOGLE_MAPS_API_KEY=api_key
WALK_SCORE_API_KEY=api_key
```

## Usage

```php
// Use Facades
use Hilioski\NearbyDistanceScore\Facades\GoogleNearby;
use Hilioski\NearbyDistanceScore\Facades\GoogleDistance;
use Hilioski\NearbyDistanceScore\Facades\GoogleGeoCoding;
use Hilioski\NearbyDistanceScore\Facades\WalkScore;

$nearbyPOI = GoogleNearby::getNearbyLocations($latitude, $longitude, $radius, $maxResults, $optionalParameters);
$distance  = GoogleDistance::calculate($origins, $destinations);
$geoCoding = GoogleGeoCoding::geoCodeAddress('Santa Monica Beach, Santa Monica, CA, USA')
$score     = WalkScore::getScore($latitude, $longitude, 'Santa Monica Beach, Santa Monica, CA, USA', ['bike' => 1, 'transit' => 1])

// Use Helper Function
$nearbyPOI = google_nearby($latitude, $longitude, $radius, $maxResults, $optionalParameters);
$distance  = google_distance($origins, $destinations);
$geoCoding = google_geocoding('Santa Monica Beach, Santa Monica, CA, USA')
$score     = walk_score($latitude, $longitude, 'Santa Monica Beach, Santa Monica, CA, USA', ['bike' => 1, 'transit' => 1])

```

## Credits

- [Hristian Ilioski](https://github.com/hilioski)

For more info, please visit:
- https://developers.google.com/maps/documentation/distance-matrix/intro
- https://developers.google.com/places/web-service/search#PlaceSearchRequests
- https://www.walkscore.com/professional/api.php
