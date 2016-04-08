<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.select', [
                                  'title' => 'Price',
                                  'name' => 'price_id', //price,//'prices',
                                  'options' => $prices->lists('id','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => [],
                                ])

@include('asgardgenerators::partials.fields.select', [
                                  'title' => 'ProductVersion',
                                  'name' => 'product_version_id', //productVersion,//'product_version',
                                  'options' => $productVersions->lists('id','id')->toArray(),
                                  'primary_key' => ["id"],
                                  'selected' => [],
                                ])


    </p>
</div>
