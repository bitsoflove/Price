@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('price::vats.title.edit vat') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.price.vat.index') }}">{{ trans('price::vats.title.vats') }}</a></li>
        <li class="active">{{ trans('price::vats.title.edit vat') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.price.vat.update', $vat->id], 'method' => 'put']) !!}

   <div class="row">
       <div class="col-md-12">
           <div class="box box-primary">
               <div class="box-header">
                   <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
               </div>
               <div class="box-body">
                   <div class="nav-tabs-custom">
                       <ul class="nav nav-tabs">
                           <?php $i = 0; ?>
                           <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                               <?php $i++; ?>
                               <li class="{{ App::getLocale() == $locale ? 'active' : '' }}">
                                   <a href="#tab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                               </li>
                           <?php endforeach; ?>
                       </ul>
                       <div class="tab-content">
                           <?php $i = 0; ?>
                           <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                               <?php $i++; ?>
                               <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                   @include('price::admin.vats.edit-translation-fields', ['lang' => $locale])
                               </div>
                           <?php endforeach; ?>
                       </div>
                   </div>
               </div>
           </div>
           <div class="box box-primary">
               <div class="box-header">
                   <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
               </div>
               <div class="box-body">
                   @include('price::admin.vats.edit-fields', ['lang' => $locale])
               </div>
           </div>
           <div class="box-footer">
               <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
               <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
               <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.price.vat.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    { key: 'b', route: "<?= route('admin.price.vat.index') ?>" }
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
