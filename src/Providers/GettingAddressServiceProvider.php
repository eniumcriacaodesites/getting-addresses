<?php

namespace EniumCriacaoSites\GettingAddresses\Providers;

use Illuminate\Support\ServiceProvider;
use EniumCriacaoSites\GettingAddresses\Commands\ImportStatesAndCitiesCommand;
use EniumCriacaoSites\GettingAddresses\Services\Integration\IbgeRestIntegrationService;

class GettingAddressServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfig();
        $this->registerCommands();
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function register()
    {
        $this->app->singleton(IbgeRestIntegrationService::class, function ($app) {
            return new IbgeRestIntegrationService(
                config('ibge.integration.host', 'http://localhost:8000'),
                config('ibge.integration.timeout', 20)
            );
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportStatesAndCitiesCommand::class,
            ]);
        }
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/gettingaddress.php' => config_path('ibge.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}