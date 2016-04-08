<div class="box-body">
    <p>
        @include('asgardgenerators::partials.fields.text', [
                      'title' => 'Name',
                      'name' => 'name',
                      'value' => $country->name,
                      'placeholder' => '',
                      'is_translation' => 0
                    ])

@include('asgardgenerators::partials.fields.text', [
                      'title' => 'Iso 2',
                      'name' => 'iso_2',
                      'value' => $country->iso_2,
                      'placeholder' => '',
                      'is_translation' => 0
                    ])


    </p>
</div>
