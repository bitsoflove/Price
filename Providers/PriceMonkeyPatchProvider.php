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
    }
}
