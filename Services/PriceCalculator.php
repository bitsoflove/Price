<?php

namespace Modules\Price\Services;

use Modules\Price\Contracts\PriceAdjustmentInterface;
use Modules\Price\Entities\Price;
use Modules\Price\ValueObjects\PriceValueObject;

class PriceCalculator
{

    /**
     * @var Price
     */
    protected $base_price;

    /**
     * @var array
     */
    protected $adjustments;

    /**
     * @var array
     */
    protected $steps = [];

    /**
     * PriceCalculator constructor.
     * @param $base_price
     * @param $adjustments
     */
    public function __construct(
        Price $base_price,
        array $adjustments = []
    ) {
        $this->base_price = $base_price;
        
        array_walk($adjustments, function(PriceAdjustmentInterface $adjustment){
            $this->addAdjustment($adjustment);
        });
    }

    /**
     * Add a price adjustment
     *
     * @param PriceAdjustmentInterface $adjustment
     * @return PriceCalculator
     */
    public function addAdjustment(PriceAdjustmentInterface $adjustment)
    {
        $this->adjustments[] = $adjustment;
        return $this;
    }

    /**
     * Do the actual price calculation
     *
     * @return PriceValueObject | null
     */
    public function calculate(bool $round=false)
    {
        if (is_null($this->base_price->price)) {
            return null;
        }

        // set the base price amount
        $this->steps[] = $total = $this->base_price->price;

        foreach ($this->adjustments as $adjustment) {
            switch ($adjustment->direction()) {
                case 'positive':
                    $this->steps[] = "{$total} + {$adjustment->amount()}";
                    $this->steps[] = $total += $adjustment->amount();
                    break;
                case 'negative':
                default:
                    $this->steps[] = "{$total} - {$adjustment->amount()}";
                    $this->steps[] = $total -= $adjustment->amount();
            }
        }

        if($round) {
            $total = round($total * 100) / 100;
        }

        return PriceValueObject::create($total);
    }

    /**
     * Get a step by step
     *
     * @return array
     */
    public function debug(){
        return $this->steps;
    }
}