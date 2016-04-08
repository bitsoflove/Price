<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.text', [
                      'title' => 'Price',
                      'name' => 'price',
                      'value' => '',
                      'placeholder' => '',
                      'is_translation' => 0
                    ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'Currency',
                                  'name' => 'currency_id', //currency,//'currencies',
                                  'options' => $currencies->lists('name','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $price->currency()->lists("id","id")->toArray(),
                                ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'PriceType',
                                  'name' => 'price_type_id', //priceType,//'price_types',
                                  'options' => $priceTypes->lists('slug','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $price->priceType()->lists("id","id")->toArray(),
                                ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'Unit',
                                  'name' => 'unit_id', //unit,//'units',
                                  'options' => $units->lists('id','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $price->unit()->lists("id","id")->toArray(),
                                ])


    </p>
</div>
