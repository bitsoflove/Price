<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    /**
     * Generated
     */

    protected $table = 'countries';
    protected $fillable = ['id', 'name', 'iso_2'];

    public function priceTypeVats()
    {
        return $this->hasMany(\Modules\Price\Entities\PriceTypeVat::class, 'country_id', 'id');
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
