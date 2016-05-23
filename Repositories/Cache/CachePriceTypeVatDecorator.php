<?php

namespace Modules\Price\Repositories\Cache;

use Illuminate\Support\Collection;
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

    /**
     * Get a fully loaded collection of price type vat entities
     *
     * @return Collection
     */
    public function allFullyLoaded()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allFullyLoaded", $this->cacheTime,
                function () {
                    return $this->repository->allFullyLoaded();
                }
            );
    }
}
