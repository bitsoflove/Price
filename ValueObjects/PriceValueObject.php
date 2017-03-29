<?php

namespace Modules\Price\ValueObjects;

use Modules\Price\Entities\Currency;

class PriceValueObject
{

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var Currency
     */
    protected $currency;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param float | null $amount
     * @return PriceValueObject
     */
    public static function create($amount)
    {
        return new static($amount);
    }

    /**
     * @param int $amount
     * @return PriceValueObject
     */
    public static function createFromCents(int $amount)
    {
        return new static($amount / 100);
    }

    /**
     * @param Currency $currency
     * @return PriceValueObject
     */
    public function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        if (is_null($this->currency)) {
            // load the default currency
            $this->currency = \Currency::default();
        }

        return $this->currency;
    }

    /**
     * Format the price with the configured options
     *
     * @param bool $currency
     * @param null $decimals
     * @param bool $round
     * @return string
     */
    public function format($currency = false, $decimals = null, $round = true)
    {
        if (is_null($this->amount)) {
            return null;
        }

        $decimals = !is_null($decimals) ? $decimals : config('asgard.price.config.format.decimals', 2);

        // set the basic format
        $format = [
            number_format(
                $round === true ? price_custom_floor($this->amount) : $this->amount,
                $decimals,
                config('asgard.price.config.format.decimal_point', '.'),
                config('asgard.price.config.format.thousands_sep', ',')
            )
        ];

        if ($currency === true) {
            $currency = $this->getCurrency();

            $signs = collect(config('asgard.price.config.currency.signs', []));

            if ($signs->has(strtolower($currency->iso_4217))) {
                $prefix = $signs->get(strtolower($currency->iso_4217), false);

                if ($prefix) {
                    $format = array_prepend($format, " ");
                    $format = array_prepend($format, $prefix);
                }
            }
        }

        return implode("", $format);
    }

    /**
     * Format the price with the default currency sign
     *
     * @param null $decimals
     * @param bool $round
     * @return string
     */
    public function formatWithCurrency($decimals = null, $round = true)
    {
        return $this->format(true, $decimals, $round);
    }

    /**
     * Create a float representation for the price
     *
     * @return float
     */
    public function amount()
    {
        return floatval($this->amount);
    }

    /**
     * Create a cents representation for the price
     *
     * @return int
     */
    public function cents()
    {
        return intval(round($this->amount * 100));
    }

    /**
     * Returns the amount as a string
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->amount();
    }

    /**
     * Cast the current object to an array
     *
     * @param array $options
     * @return array
     */
    public function toArray($options = [])
    {
        // retrieve the value or set defaults
        $round = array_get($options, 'round', false);
        $decimals = array_get($options, 'decimals', null);

        return [
            'amount' => $this->amount(),
            'cents' => $this->cents(),
            'formatted' => $this->format(false, $decimals, $round),
            'formatted_with_currency' => $this->formatWithCurrency($decimals, $round),
            'currency' => $this->getCurrency()->toArray(),
        ];
    }


}
