<?php namespace Modules\Price\Providers;

use Modules\Price\Facades\Gateways\CurrencyGateway;
use Modules\Price\Providers\PriceMonkeyPatchProvider;
use Illuminate\Support\ServiceProvider;

class PriceServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(PriceMonkeyPatchProvider::class);

        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $migrations = realpath(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            $migrations => $this->app->databasePath() . '/migrations',
        ], 'migrations');


        $this->app->bind(
            'Modules\Price\Repositories\CurrencyRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentCurrencyRepository(new \Modules\Price\Entities\Currency());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CacheCurrencyDecorator($repository);
            }
        );


        $this->app->bind(
            'Modules\Price\Repositories\PriceTypeRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentPriceTypeRepository(new \Modules\Price\Entities\PriceType());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CachePriceTypeDecorator($repository);
            }
        );


        $this->app->bind(
            'Modules\Price\Repositories\UnitRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentUnitRepository(new \Modules\Price\Entities\Unit());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CacheUnitDecorator($repository);
            }
        );


        $this->app->bind(
            'Modules\Price\Repositories\PriceRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentPriceRepository(new \Modules\Price\Entities\Price());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CachePriceDecorator($repository);
            }
        );


        $this->app->bind(
            'Modules\Price\Repositories\ProductVersionPriceRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentProductVersionPriceRepository(new \Modules\Price\Entities\ProductVersionPrice());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CacheProductVersionPriceDecorator($repository);
            }
        );


        $this->app->bind(
            'Modules\Price\Repositories\VatRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentVatRepository(new \Modules\Price\Entities\Vat());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CacheVatDecorator($repository);
            }
        );



        $this->app->bind(
            'Modules\Price\Repositories\PriceTypeVatRepository',
            function () {
                $repository = new \Modules\Price\Repositories\Eloquent\EloquentPriceTypeVatRepository(new \Modules\Price\Entities\PriceTypeVat());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Price\Repositories\Cache\CachePriceTypeVatDecorator($repository);
            }
        );

        $this->app->bind('currency', function(){
            return $this->app->make(CurrencyGateway::class);
        });

// add bindings

    }

}
