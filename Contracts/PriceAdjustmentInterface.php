<?php

namespace Modules\Price\Contracts;

interface PriceAdjustmentInterface
{

    /**
     * The amount the price should be adjusted with
     *
     * @return float
     */
    public function amount():float;


    /**
     * The direction the price should be adjusted with
     *  - positive: the adjustment is added to the price
     *  - negative: the adjustment is subtracted from the price
     *
     * @return string
     */
    public function direction():string;


}