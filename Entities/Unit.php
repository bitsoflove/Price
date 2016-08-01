<?php

namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * @var string
     */
    protected $table = 'units';

    /**
     * @var array
     */
    protected $fillable = ['id', 'quantity', 'unit'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'unit_id', 'id');
    }

    /**
     * @param array $attributes
     *
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
     *
     * @return static
     */
    public static function create(array $attributes = [])
    {
        $res = parent::create($attributes);
        self::sync($res, $attributes);

        return $res;
    }

    /**
     * Sync many-to-many relationships.
     *
     * @param Model $model
     * @param array $attributes
     */
    private static function sync($model, array $attributes = [])
    {
    }
}
