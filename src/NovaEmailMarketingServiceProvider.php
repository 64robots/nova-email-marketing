<?php

namespace R64\NovaEmailMarketingTool;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use R64\NovaEmailMarketingTool\Http\Middleware\Authorize;

class NovaEmailMarketingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-email-marketing-tool');

        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->app->booted(function () {
            $this->routes();
        });


        if (!$this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/nova-email-marketing-tool.php', 'nova-email-marketing-tool');
        }

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/nova-email-marketing-tool')
                ->group(__DIR__.'/../routes/api.php');
    }
    
    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/nova-email-marketing-tool.php' => config_path('nova-email-marketing-tool.php'),
        ], 'nova-email-marketing-tool');
    }
}
