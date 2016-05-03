<?php

namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Price\Entities\Vat;

class CustomerTypeVat extends Model
{
    /**
     * @var string
     */
    protected $table = "customer_type_vat";

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'customer_type_id',
        'vat_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerType(){
        return $this->belongsTo(
            CustomerType::class
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vat(){
        return $this->belongsTo(
          Vat::class
        );
    }

}