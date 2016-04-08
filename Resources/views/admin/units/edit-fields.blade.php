<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.text', [
                      'title' => 'Quantity',
                      'name' => 'quantity',
                      'value' => $unit->quantity,
                      'placeholder' => '',
                      'is_translation' => 0
                    ])

@include('asgardgenerators::partials.fields.text', [
                      'title' => 'Unit',
                      'name' => 'unit',
                      'value' => $unit->unit,
                      'placeholder' => '',
                      'is_translation' => 0
                    ])


    </p>
</div>
