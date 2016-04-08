<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\ProductVersionPriceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductVersionPriceDecorator extends BaseCacheDecorator implements ProductVersionPriceRepository
{
    public function __construct(ProductVersionPriceRepository $productVersionPrice)
    {
        parent::__construct();
        $this->entityName = 'productversionprices';
        $this->repository = $productVersionPrice;
    }
}
