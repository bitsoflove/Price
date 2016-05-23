@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('price::pricetypevats.title.edit pricetypevat') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.price.pricetypevat.index') }}">{{ trans('price::pricetypevats.title.pricetypevats') }}</a></li>
        <li class="active">{{ trans('price::pricetypevats.title.edit pricetypevat') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.price.pricetypevat.update', $priceTypeVat->id], 'method' => 'put']) !!}

   <div class="row">
       <div class="col-md-12">
           <div class="box box-primary">
               <div class="box-header">
                   <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
               </div>
               <div class="box-body">
                   @include('price::admin.price_type_vats.edit-fields')
               </div>
           </div>
           <div class="box-footer">
               <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
               <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
               <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.price.pricetypevat.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
           </div>
       </div>
   </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.price.pricetypevat.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
