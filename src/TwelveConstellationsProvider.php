<?php

namespace Jubilee\Click108;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use Jubilee\Click108\Console\Commands\DetectorConstellations;
use Jubilee\Click108\Http\Controllers\TwelveConstellationsController;

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
            $schedule->command(DetectorConstellations::class)->daily();
        });
        $this->loadRoutesFrom(__DIR__ . DIRECTORY_SEPARATOR . 'routes.php');
        $this->loadViewsFrom(__DIR__ . DIRECTORY_SEPARATOR . 'resource' . DIRECTORY_SEPARATOR . 'view', 'test');
        $this->loadMigrationsFrom(__DIR__ . DIRECTORY_SEPARATOR);
        $this->publishes(
            [
                __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations'                  =>
                    base_path('database' . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR),
                __DIR__ . DIRECTORY_SEPARATOR . 'resource' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR =>
                    base_path('resources' . DIRECTORY_SEPARATOR . 'views'),
                __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'factories'                   =>
                    base_path('database' . DIRECTORY_SEPARATOR . 'factories' . DIRECTORY_SEPARATOR)
            ]
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make(TwelveConstellationsController::class);
    }
}
