<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\CustomerType;
use Modules\Price\Entities\PriceTypeVat;

class Vat extends Model
{
    /**
     * @var string
     */
    protected $table = 'vat';

    /**
     * @var array
     */
    protected $fillable = ['id', 'slug', 'percentage'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function priceTypeVats()
    {
        return $this->hasMany(
            PriceTypeVat::class,
            'vat_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customerTypes()
    {
        return $this->belongsToMany(
            CustomerType::class,
            'customer_type_vat',
            'vat_id'
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
        if (isset($attributes['customer_types'])) {
            $model->customerTypes()->sync($attributes['customer_types']);
        }
    }
}
