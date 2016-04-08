<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{

    /**
     * Generated
     */

    protected $table = 'vat';
    protected $fillable = ['id', 'slug', 'percentage'];

    


    public function priceTypeVats()
    {
        return $this->hasMany(\Modules\Price\Entities\PriceTypeVat::class, 'vat_id', 'id');
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
