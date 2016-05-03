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

    <?php $checked = $vat->customerTypes->lists('id'); ?>

    @foreach($customerTypes as $customerType)

        <div class="checkbox">
            <label>
                <input
                        type="checkbox"
                        name="customer_types[]"
                        value="{{ $customerType->id }}"
                        @if($checked->search($customerType->id) !== false)
                        checked="checked"
                        @endif
                > {{ $customerType->slug }}

            </label>
        </div>


        @endforeach

        </p>
</div>
