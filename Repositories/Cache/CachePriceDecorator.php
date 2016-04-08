<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\PriceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePriceDecorator extends BaseCacheDecorator implements PriceRepository
{
    public function __construct(PriceRepository $price)
    {
        parent::__construct();
        $this->entityName = 'prices';
        $this->repository = $price;
    }
}
