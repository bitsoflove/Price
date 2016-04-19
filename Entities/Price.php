<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Price\Entities\Currency;
use Modules\Price\Entities\PriceType;
use Modules\Price\Entities\ProductVersionPrice;
use Modules\Price\Entities\Unit;

class Price extends Model
{

    /**
     * Generated
     */

    protected $table = 'prices';
    protected $fillable = ['id', 'price_type_id', 'price', 'currency_id', 'unit_id'];

    


    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    public function priceType()
    {
        return $this->belongsTo(PriceType::class, 'price_type_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function productVersions()
    {
        return $this->belongsToMany(config('asgard.product.config.entities.product-version.class',
            "\\Modules\\Product\\Entities\\ProductVersion"),
            'product_version_prices',
            'price_id',
            'product_version_id'
        );
    }

    public function productVersionPrices()
    {
        return $this->hasMany(ProductVersionPrice::class, 'price_id', 'id');
    }



    public function update(array $attributes = [])
    {
        $res = parent::update($attributes);
        self::sync($this, $attributes);
        return $res;
    }

    public static function create(array $attributes = [])
    {
        $res = parent::create($attributes);
        self::sync($res, $attributes);
        return $res;
    }

    /**
     * Sync many-to-many relationships
     */
    private static function sync($model, array $attributes = [])
    {
        // @todo: give the monkey a banana ....
//        if (isset($attributes['productVersions'])) {
//            $model->productVersions()->sync($attributes['productVersions']);
//        }
    }
}
