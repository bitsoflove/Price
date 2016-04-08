<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductVersionPrice extends Model
{

    /**
     * Generated
     */

    protected $table = 'product_version_prices';
    protected $fillable = ['product_version_id', 'price_id'];

    


    public function price()
    {
        return $this->belongsTo(\Modules\Price\Entities\Price::class, 'price_id', 'id');
    }

    public function productVersion()
    {
        // @todo: link to product table
//        return $this->belongsTo(\Modules\Price\Entities\ProductVersion::class, 'product_version_id', 'id');
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
