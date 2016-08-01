<?php

namespace Modules\Price\Providers;

use Modules\Countries\Entities\Country;
use Modules\Price\Entities\Price;
use Modules\Price\Entities\PriceTypeVat;
use Modules\Price\Entities\ProductVersionDiscount;
use Modules\Price\Entities\ProductVersionPrice;
use Modules\Product\Providers\BaseMonkeyPatchProvider;

class PriceMonkeyPatchProvider extends BaseMonkeyPatchProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->productVersion->addExternalMethod('productVersionPrices', function () {
            return $this->hasMany(
                ProductVersionPrice::class,
                'product_version_id',
                'id'
            );
        });

        $this->productVersion->addExternalMethod('productVersionDiscounts', function () {
            return $this->hasMany(
                ProductVersionDiscount::class,
                'product_version_id',
                'id'
            );
        });

        $this->productVersion->addExternalMethod('prices', function () {
            return $this->belongsToMany(
                Price::class,
                'product_version_prices',
                'product_version_id',
                'price_id'
            );
        });

        $this->productVersion->addExternalMethod('getPriceForType', function ($type) {
            // due to performance issues we replace the whereHas relationship resolution
            // with a collection function
//            return $this->prices()->whereHas('priceType', function ($q) use ($type) {
//                $q->where('slug', '=', $type);
//            })->first();

            $rtn = null;

            $this->prices->each(function($price)use(&$rtn, $type){
                if(!is_null($price->priceType) && $price->priceType->slug == $type){
                    $rtn = $price;
                    return false; // stop execution
                }
            });

            return $rtn;
        });

        /*
         * If we only have one price we can use a default price
         */
        $this->productVersion->addExternalMethod('getDefaultPriceAttribute', function () {
            return $this->getPriceForType(config('asgard.price.config.price_types.default', 'normal'));
        });

        /*
         * Quickly get the first discount value
         */
        $this->productVersion->addExternalMethod('getDiscountAttribute', function () {
            return $this->productVersionDiscounts->first();
        });

    }
}
