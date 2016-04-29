<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Price\Entities\Price;

class ProductVersionPrice extends Model
{

    /**
     * @var string
     */
    protected $table = 'product_version_prices';

    /**
     * @var array
     */
    protected $fillable = [
        'product_version_id',
        'price_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id', 'id');
    }

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
     * 
     * @param Model $model
     * @param array $attributes
     */
    private static function sync($model, array $attributes = [])
    {
    }
}
