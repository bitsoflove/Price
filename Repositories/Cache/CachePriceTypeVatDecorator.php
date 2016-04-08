<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\PriceTypeVatRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePriceTypeVatDecorator extends BaseCacheDecorator implements PriceTypeVatRepository
{
    public function __construct(PriceTypeVatRepository $priceTypeVat)
    {
        parent::__construct();
        $this->entityName = 'pricetypevats';
        $this->repository = $priceTypeVat;
    }
}
