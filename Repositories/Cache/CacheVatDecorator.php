<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\VatRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheVatDecorator extends BaseCacheDecorator implements VatRepository
{
    public function __construct(VatRepository $vat)
    {
        parent::__construct();
        $this->entityName = 'vats';
        $this->repository = $vat;
    }
}
