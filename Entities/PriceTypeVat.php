<?php namespace Modules\Price\Entities;

use Greabock\Tentacles\EloquentTentacle;
use Illuminate\Database\Eloquent\Model;
use Modules\Price\Entities\Country;
use Modules\Price\Entities\PriceType;
use Modules\Price\Entities\Vat;

class PriceTypeVat extends Model
{
    /**
     * @var string
     */
    protected $table = 'price_type_vat';

    /**
     * @var array
     */
    protected $fillable = [
        'price_type_id',
        'vat_id',
        'country_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(
            Country::class,
            'country_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priceType()
    {
        return $this->belongsTo(
            PriceType::class,
            'price_type_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vat()
    {
        return $this->belongsTo(
            Vat::class,
            'vat_id',
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
