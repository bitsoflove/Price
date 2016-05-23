<?php

namespace Modules\Price\Repositories;

use Illuminate\Support\Collection;
use Modules\Core\Repositories\BaseRepository;

interface PriceTypeVatRepository extends BaseRepository
{

    /**
     * Get a fully loaded collection of price type vat entities
     *
     * @return Collection
     */
    public function allFullyLoaded();

}
