<?php

namespace Modules\Price\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Price\Entities\Currency;

interface CurrencyRepository extends BaseRepository
{
    /**
     * @param string $iso
     * @return Currency|null
     */
    public function findByIso($iso);

    }
