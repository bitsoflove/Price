<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.text', [
                      'title' => 'Name',
                      'name' => 'name',
                      'value' => $currency->name,
                      'placeholder' => '',
                      'is_translation' => 0
                    ])

@include('asgardgenerators::partials.fields.text', [
                      'title' => 'Iso 4217',
                      'name' => 'iso_4217',
                      'value' => $currency->iso_4217,
                      'placeholder' => '',
                      'is_translation' => 0
                    ])


    </p>
</div>
