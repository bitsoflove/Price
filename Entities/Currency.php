<?php

namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * @var string
     */
    protected $table = 'currencies';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'iso_4217',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'currency_id', 'id');
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
