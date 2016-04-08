<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\UnitRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheUnitDecorator extends BaseCacheDecorator implements UnitRepository
{
    public function __construct(UnitRepository $unit)
    {
        parent::__construct();
        $this->entityName = 'units';
        $this->repository = $unit;
    }
}
