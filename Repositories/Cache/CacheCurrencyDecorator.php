<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Entities\Currency;
use Modules\Price\Repositories\CurrencyRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCurrencyDecorator extends BaseCacheDecorator implements CurrencyRepository
{
    public function __construct(CurrencyRepository $currency)
    {
        parent::__construct();
        $this->entityName = 'currencies';
        $this->repository = $currency;
    }

    /**
     * @param string $iso
     * @return Currency|null
     */
    public function findByIso($iso)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.findByIso.{$iso}", $this->cacheTime,
                function () use ($iso) {
                    return $this->repository->findByIso($iso);
                }
            );
    }
}
