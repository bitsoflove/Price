<?php

namespace Modules\Price\Repositories\Eloquent;

use Modules\Price\Repositories\UnitRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentUnitRepository extends EloquentBaseRepository implements UnitRepository
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
}
