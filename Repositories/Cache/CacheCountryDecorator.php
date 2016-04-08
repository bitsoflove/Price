<?php

namespace Modules\Price\Repositories\Cache;

use Modules\Price\Repositories\CountryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCountryDecorator extends BaseCacheDecorator implements CountryRepository
{
    public function __construct(CountryRepository $country)
    {
        parent::__construct();
        $this->entityName = 'countries';
        $this->repository = $country;
    }
}
