<div class="box-body">
    <p>
    @include('asgardgenerators::partials.fields.text', [
                  'title' => 'Slug',
                  'name' => 'slug',
                  'value' => old('slug', $vat->slug),
                  'placeholder' => '',
                  'is_translation' => 0
                ])

    @include('asgardgenerators::partials.fields.text', [
                          'title' => 'Percentage',
                          'name' => 'percentage',
                          'value' => old('percentage', $vat->percentage),
                          'placeholder' => '',
                          'is_translation' => 0
                        ])

        </p>
</div>
