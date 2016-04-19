<?php

namespace Modules\Price\Entities;


use Illuminate\Database\Eloquent\Model;

class ProductVersionDiscount extends Model {

    protected $table = "product_version_discount";

    protected $fillable = ['product_version_id', 'discount_type', 'amount'];

    public function productVersion(){
        return $this->belongsTo(
            config('asgard.product.config.entities.product-version.class',
                "\\Modules\\Product\\Entities\\ProductVersion"),
            'product_version_id',
            'id'
        );
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

    }

}