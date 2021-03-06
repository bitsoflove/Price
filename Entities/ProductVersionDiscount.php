<?php

namespace Modules\Price\Entities;


use Illuminate\Database\Eloquent\Model;

class ProductVersionDiscount extends Model
{

    /**
     * @var string
     */
    protected $table = "product_version_discount";

    /**
     * @var array
     */
    protected $fillable = [
        'product_version_id',
        'discount_type',
        'amount'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productVersion()
    {
        return $this->belongsTo(
            config('asgard.product.config.entities.product-version.class',
                "\\Modules\\Product\\Entities\\ProductVersion"),
            'product_version_id',
            'id'
        );
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
     * @param Model $model
     * @param array $attributes
     */
    private static function sync($model, array $attributes = [])
    {

    }

}