<?php

namespace Hilioski\NearbyDistanceScore\Providers;

use Hilioski\NearbyDistanceScore\GoogleNearby;
use Hilioski\NearbyDistanceScore\WalkScore;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Hilioski\NearbyDistanceScore\GoogleDistance;

class NearbyDistanceScoreServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/nearby-distance-score.php' => config_path('nearby-distance-score.php'),
            ], 'nearby-distance-score');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('google-nearby', function (Container $app) {
            return new GoogleNearby($app['config']['nearby-distance-score.google.api_key']);
        });

        $this->app->singleton('google-distance', function (Container $app) {
            return new GoogleDistance($app['config']['nearby-distance-score.google.api_key']);
        });

        $this->app->singleton('walk-score', function (Container $app) {
            return new WalkScore($app['config']['nearby-distance-score.walk_score.api_key']);
        });

        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('GoogleNearby', \Hilioski\NearbyDistanceScore\Facades\GoogleNearby::class);
            $loader->alias('GoogleDistance', \Hilioski\NearbyDistanceScore\Facades\GoogleDistance::class);
            $loader->alias('WalkScore', \Hilioski\NearbyDistanceScore\Facades\WalkScore::class);
        });
    }
}
