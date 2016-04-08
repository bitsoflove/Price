<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.select', [
                                  'title' => 'Country',
                                  'name' => 'country_id', //country,//'countries',
                                  'options' => $countries->lists('name','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $priceTypeVat->country()->lists("id","id")->toArray(),
                                ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'PriceType',
                                  'name' => 'price_type_id', //priceType,//'price_types',
                                  'options' => $priceTypes->lists('slug','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $priceTypeVat->priceType()->lists("id","id")->toArray(),
                                ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'Vat',
                                  'name' => 'vat_id', //vat,//'vat',
                                  'options' => $vats->lists('id','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $priceTypeVat->vat()->lists("id","id")->toArray(),
                                ])


    </p>
</div>
