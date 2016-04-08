<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\PriceTypeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePriceTypeDecorator extends BaseCacheDecorator implements PriceTypeRepository
{
    public function __construct(PriceTypeRepository $priceType)
    {
        parent::__construct();
        $this->entityName = 'pricetypes';
        $this->repository = $priceType;
    }
}
