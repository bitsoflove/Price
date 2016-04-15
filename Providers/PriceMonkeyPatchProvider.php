<?php namespace Modules\Price\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Price\Entities\Price;
use Modules\Price\Entities\ProductVersionPrice;

class PriceMonkeyPatchProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $productVersion = $this->app->make('bol.product.version');

        $productVersion->addExternalMethod('productVersionPrices', function () {
            return $this->hasMany(
                ProductVersionPrice::class,
                'product_version_id',
                'id'
            );
        });

        $productVersion->addExternalMethod('prices', function () {
            return $this->belongsToMany(
                Price::class,
                'product_version_prices',
                'product_version_id',
                'price_id'
            );
        });

        $productVersion->addExternalMethod('getDefaultPriceAttribute', function () {
            // @todo: refactor this to work with slug instead of id
            return $this->prices()
                ->where('price_type_id', "=", config('asgard.price.config.price_types.default', 1))
                ->first();
        });

    }
}
