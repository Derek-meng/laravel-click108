<?php

namespace Jubilee\Click108;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use Jubilee\Click108\Console\Commands\DetectorConstellations;

class TwelveConstellationsProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands(
            DetectorConstellations::class
        );
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command(DetectorConstellations::class)->everyMinute();
        });
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->publishes([
            __DIR__ . '/Migrations' => base_path('database/migrations/'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
