<?php

namespace Modules\Price\Presenters;

use Laracasts\Presenter\Presenter;

class PricePresenter extends Presenter
{


    /**
     * A printable price
     *
     * @return string
     */
    public function format()
    {
        return number_format(
            $this->price,
            config('asgard.price.config.format.decimals', 2),
            config('asgard.price.config.format.decimal_point', '.'),
            config('asgard.price.config.format.thousands_sep', ',')
        );
    }


}