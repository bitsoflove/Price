<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class PriceTypeVat extends Model
{

    /**
     * Generated
     */

    protected $table = 'price_type_vat';
    protected $fillable = ['price_type_id', 'vat_id', 'country_id'];

    


    public function country()
    {
        return $this->belongsTo(\Modules\Price\Entities\Country::class, 'country_id', 'id');
    }

    public function priceType()
    {
        return $this->belongsTo(\Modules\Price\Entities\PriceType::class, 'price_type_id', 'id');
    }

    public function vat()
    {
        return $this->belongsTo(\Modules\Price\Entities\Vat::class, 'vat_id', 'id');
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
