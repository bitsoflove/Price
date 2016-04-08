<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/price'], function (Router $router) {
    $router->bind('currencies', function ($id) {
        return app('Modules\Price\Repositories\CurrencyRepository')->find($id);
    });
    get('currencies', ['as' => 'admin.price.currency.index', 'uses' => 'CurrencyController@index']);
    get('currencies/create', ['as' => 'admin.price.currency.create', 'uses' => 'CurrencyController@create']);
    post('currencies', ['as' => 'admin.price.currency.store', 'uses' => 'CurrencyController@store']);
    get('currencies/{currencies}/edit', ['as' => 'admin.price.currency.edit', 'uses' => 'CurrencyController@edit']);
    put('currencies/{currencies}/edit', ['as' => 'admin.price.currency.update', 'uses' => 'CurrencyController@update']);
    delete('currencies/{currencies}', ['as' => 'admin.price.currency.destroy', 'uses' => 'CurrencyController@destroy']);


    $router->bind('pricetypes', function ($id) {
        return app('Modules\Price\Repositories\PriceTypeRepository')->find($id);
    });
    get('pricetypes', ['as' => 'admin.price.pricetype.index', 'uses' => 'PriceTypeController@index']);
    get('pricetypes/create', ['as' => 'admin.price.pricetype.create', 'uses' => 'PriceTypeController@create']);
    post('pricetypes', ['as' => 'admin.price.pricetype.store', 'uses' => 'PriceTypeController@store']);
    get('pricetypes/{pricetypes}/edit', ['as' => 'admin.price.pricetype.edit', 'uses' => 'PriceTypeController@edit']);
    put('pricetypes/{pricetypes}/edit', ['as' => 'admin.price.pricetype.update', 'uses' => 'PriceTypeController@update']);
    delete('pricetypes/{pricetypes}', ['as' => 'admin.price.pricetype.destroy', 'uses' => 'PriceTypeController@destroy']);


    $router->bind('units', function ($id) {
        return app('Modules\Price\Repositories\UnitRepository')->find($id);
    });
    get('units', ['as' => 'admin.price.unit.index', 'uses' => 'UnitController@index']);
    get('units/create', ['as' => 'admin.price.unit.create', 'uses' => 'UnitController@create']);
    post('units', ['as' => 'admin.price.unit.store', 'uses' => 'UnitController@store']);
    get('units/{units}/edit', ['as' => 'admin.price.unit.edit', 'uses' => 'UnitController@edit']);
    put('units/{units}/edit', ['as' => 'admin.price.unit.update', 'uses' => 'UnitController@update']);
    delete('units/{units}', ['as' => 'admin.price.unit.destroy', 'uses' => 'UnitController@destroy']);


    $router->bind('prices', function ($id) {
        return app('Modules\Price\Repositories\PriceRepository')->find($id);
    });
    get('prices', ['as' => 'admin.price.price.index', 'uses' => 'PriceController@index']);
    get('prices/create', ['as' => 'admin.price.price.create', 'uses' => 'PriceController@create']);
    post('prices', ['as' => 'admin.price.price.store', 'uses' => 'PriceController@store']);
    get('prices/{prices}/edit', ['as' => 'admin.price.price.edit', 'uses' => 'PriceController@edit']);
    put('prices/{prices}/edit', ['as' => 'admin.price.price.update', 'uses' => 'PriceController@update']);
    delete('prices/{prices}', ['as' => 'admin.price.price.destroy', 'uses' => 'PriceController@destroy']);


    $router->bind('productversionprices', function ($id) {
        return app('Modules\Price\Repositories\ProductVersionPriceRepository')->find($id);
    });
    get('productversionprices', ['as' => 'admin.price.productversionprice.index', 'uses' => 'ProductVersionPriceController@index']);
    get('productversionprices/create', ['as' => 'admin.price.productversionprice.create', 'uses' => 'ProductVersionPriceController@create']);
    post('productversionprices', ['as' => 'admin.price.productversionprice.store', 'uses' => 'ProductVersionPriceController@store']);
    get('productversionprices/{productversionprices}/edit', ['as' => 'admin.price.productversionprice.edit', 'uses' => 'ProductVersionPriceController@edit']);
    put('productversionprices/{productversionprices}/edit', ['as' => 'admin.price.productversionprice.update', 'uses' => 'ProductVersionPriceController@update']);
    delete('productversionprices/{productversionprices}', ['as' => 'admin.price.productversionprice.destroy', 'uses' => 'ProductVersionPriceController@destroy']);


    $router->bind('vats', function ($id) {
        return app('Modules\Price\Repositories\VatRepository')->find($id);
    });
    get('vats', ['as' => 'admin.price.vat.index', 'uses' => 'VatController@index']);
    get('vats/create', ['as' => 'admin.price.vat.create', 'uses' => 'VatController@create']);
    post('vats', ['as' => 'admin.price.vat.store', 'uses' => 'VatController@store']);
    get('vats/{vats}/edit', ['as' => 'admin.price.vat.edit', 'uses' => 'VatController@edit']);
    put('vats/{vats}/edit', ['as' => 'admin.price.vat.update', 'uses' => 'VatController@update']);
    delete('vats/{vats}', ['as' => 'admin.price.vat.destroy', 'uses' => 'VatController@destroy']);


    $router->bind('countries', function ($id) {
        return app('Modules\Price\Repositories\CountryRepository')->find($id);
    });
    get('countries', ['as' => 'admin.price.country.index', 'uses' => 'CountryController@index']);
    get('countries/create', ['as' => 'admin.price.country.create', 'uses' => 'CountryController@create']);
    post('countries', ['as' => 'admin.price.country.store', 'uses' => 'CountryController@store']);
    get('countries/{countries}/edit', ['as' => 'admin.price.country.edit', 'uses' => 'CountryController@edit']);
    put('countries/{countries}/edit', ['as' => 'admin.price.country.update', 'uses' => 'CountryController@update']);
    delete('countries/{countries}', ['as' => 'admin.price.country.destroy', 'uses' => 'CountryController@destroy']);


    $router->bind('pricetypevats', function ($id) {
        return app('Modules\Price\Repositories\PriceTypeVatRepository')->find($id);
    });
    get('pricetypevats', ['as' => 'admin.price.pricetypevat.index', 'uses' => 'PriceTypeVatController@index']);
    get('pricetypevats/create', ['as' => 'admin.price.pricetypevat.create', 'uses' => 'PriceTypeVatController@create']);
    post('pricetypevats', ['as' => 'admin.price.pricetypevat.store', 'uses' => 'PriceTypeVatController@store']);
    get('pricetypevats/{pricetypevats}/edit', ['as' => 'admin.price.pricetypevat.edit', 'uses' => 'PriceTypeVatController@edit']);
    put('pricetypevats/{pricetypevats}/edit', ['as' => 'admin.price.pricetypevat.update', 'uses' => 'PriceTypeVatController@update']);
    delete('pricetypevats/{pricetypevats}', ['as' => 'admin.price.pricetypevat.destroy', 'uses' => 'PriceTypeVatController@destroy']);



// append

});
