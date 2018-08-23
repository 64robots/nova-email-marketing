<?php

namespace R64\NovaEmailMarketing;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use R64\NovaEmailMarketing\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
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
            $this->mergeConfigFrom(__DIR__.'/../config/email-marketing.php', 'email-marketing');
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
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Console\TestEmailMarketingCommand::class
        ]);
    }
    
    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/email-marketing.php' => config_path('email-marketing.php'),
        ], 'email-marketing-tool');
    }
}
