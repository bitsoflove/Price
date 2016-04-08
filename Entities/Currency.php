<?php namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    /**
     * Generated
     */

    protected $table = 'currencies';
    protected $fillable = ['id', 'name', 'iso_4217'];

    


    public function prices()
    {
        return $this->hasMany(\Modules\Price\Entities\Price::class, 'currency_id', 'id');
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
