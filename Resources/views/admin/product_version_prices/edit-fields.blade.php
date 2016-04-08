<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.select', [
                                  'title' => 'Price',
                                  'name' => 'price_id', //price,//'prices',
                                  'options' => $prices->lists('id','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $productVersionPrice->price()->lists("id","id")->toArray(),
                                ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'ProductVersion',
                                  'name' => 'product_version_id', //productVersion,//'product_version',
                                  'options' => $productVersions->lists('id','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => $productVersionPrice->productVersion()->lists("id","id")->toArray(),
                                ])


    </p>
</div>
