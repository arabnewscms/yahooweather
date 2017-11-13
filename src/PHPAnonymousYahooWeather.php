<?php
namespace YahooWeather\Weather;

use Illuminate\Support\ServiceProvider;
use YahooWeather\Weather\AnonyControllerYahooWeather;
class PHPAnonymousYahooWeather extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
          $this->app['YahooWeather'] = $this->app->singleton("AnonyControllerYahooWeather", function($app)
            {
                return new AnonyControllerYahooWeather();
            });
    }
}
