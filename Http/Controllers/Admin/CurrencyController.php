<?php

namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\Currency;
use Modules\Price\Repositories\CurrencyRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Price\Repositories\PriceRepository;

class CurrencyController extends AdminBaseController
{
    /**
     * @var CurrencyRepository
     */
    protected $currency;

    /**
     * @var PriceRepository
     */
    protected $price;

    public function __construct(
        CurrencyRepository $currency,
        PriceRepository $price
    ) {
        parent::__construct();

        $this->currency = $currency;
        $this->price = $price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->currency->all();

        return view('price::admin.currencies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Currency $currency)
    {
        $variables = [
            'currency' => $currency,
            'prices' => $this->price->all(),
        ];

        return view('price::admin.currencies.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->currency->create($request->all());

        flash()->success(trans('core::core.messages.resource created',
            ['name' => trans('price::currencies.title.currencies')]));

        return redirect()->route(strtolower('admin.price.currency.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     *
     * @return Response
     */
    public function edit(Currency $currency)
    {
        $variables = [
            'currency' => $currency,
            'prices' => $this->price->all(),
        ];

        return view('price::admin.currencies.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Currency $currency
     * @param Request  $request
     *
     * @return Response
     */
    public function update(Currency $currency, Request $request)
    {
        $this->currency->update($currency, $request->all());

        flash()->success(trans('core::core.messages.resource updated',
            ['name' => trans('price::currencies.title.currencies')]));

        return redirect()->route(strtolower('admin.price.currency.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Currency $currency
     *
     * @return Response
     */
    public function destroy(Currency $currency)
    {
        $this->currency->destroy($currency);

        flash()->success(trans('core::core.messages.resource deleted',
            ['name' => trans('price::currencies.title.currencies')]));

        return redirect()->route(strtolower('admin.price.currency.index'));
    }
}
