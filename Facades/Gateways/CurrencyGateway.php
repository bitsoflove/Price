<?php

namespace Modules\Price\Facades\Gateways;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Price\Entities\Currency;
use Modules\Price\Repositories\CurrencyRepository;

class CurrencyGateway
{

    /**
     * @var CurrencyRepository
     */
    protected $currency;

    /**
     * CurrencyGateway constructor.
     * @param $currency
     */
    public function __construct(
        CurrencyRepository $currency
    ) {
        $this->currency = $currency;
    }

    public function get()
    {
        return $this->currency->all();
    }

    /**
     * Retrieve the default currency
     *
     * @return Currency
     */
    public function default()
    {
        $default = config('asgard.price.config.currency.default', 'eur');
        $currency = $this->currency->findByIso($default);

        if (is_null($currency)) {
            throw new ModelNotFoundException(sprintf("Default currency (%s) was not configured.",
                $default));
        }

        return $currency;
    }

}