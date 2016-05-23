<?php

namespace Modules\Price\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Modules\Price\Repositories\PriceTypeVatRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPriceTypeVatRepository extends EloquentBaseRepository implements PriceTypeVatRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->with('translations')->get();
        }

        return $this->model->get();
    }

    /**
     * Get a fully loaded collection of price type vat entities
     *
     * @return Collection
     */
    public function allFullyLoaded()
    {
        return $this->model->with([
            'country',
            'vat',
            'priceType'
        ])->get();
    }
}
