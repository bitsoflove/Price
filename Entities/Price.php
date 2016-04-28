<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Price\Entities\Currency;
use Modules\Price\Entities\PriceType;
use Modules\Price\Entities\ProductVersionPrice;
use Modules\Price\Entities\Unit;

class Price extends Model
{
    /**
     * @var string
     */
    protected $table = 'prices';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'price_type_id',
        'price',
        'currency_id',
        'unit_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priceType()
    {
        return $this->belongsTo(PriceType::class, 'price_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productVersions()
    {
        return $this->belongsToMany(config('asgard.product.config.entities.product-version.class',
            "\\Modules\\Product\\Entities\\ProductVersion"),
            'product_version_prices',
            'price_id',
            'product_version_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productVersionPrices()
    {
        return $this->hasMany(ProductVersionPrice::class, 'price_id', 'id');
    }

    /**
     * Retrieve the cents value into an actual price value
     *
     * @return float
     */
    public function getPriceAttribute(){
        return $this->attributes['price'] / 100;
    }

    /**
     * Transform a given price into it's cents value
     *
     * @param float $price
     */
    public function setPriceAttribute($price){
        $this->attributes['price'] = $price * 100;
    }

    /**
     * @param array $attributes
     * @return bool|int
     */
    public function update(array $attributes = [])
    {
        $res = parent::update($attributes);
        self::sync($this, $attributes);
        return $res;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public static function create(array $attributes = [])
    {
        $res = parent::create($attributes);
        self::sync($res, $attributes);
        return $res;
    }

    /**
     * Sync many-to-many relationships
     * 
     * @param Model $model
     * @param array $attributes
     */
    private static function sync($model, array $attributes = [])
    {
        // @todo: give the monkey a banana ....
//        if (isset($attributes['productVersions'])) {
//            $model->productVersions()->sync($attributes['productVersions']);
//        }
    }
}
