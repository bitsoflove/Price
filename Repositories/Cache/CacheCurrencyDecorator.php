<?php

namespace Modules\Price\Repositories\Cache;

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
}
