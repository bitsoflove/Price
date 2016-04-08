<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\Price;
use Modules\Price\Repositories\CurrencyRepository;
use Modules\Price\Repositories\PriceRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Price\Repositories\PriceTypeRepository;
use Modules\Price\Repositories\ProductVersionPriceRepository;
use Modules\Price\Repositories\UnitRepository;
use Modules\Product\Repositories\ProductVersionRepository;

class PriceController extends AdminBaseController
{
    /**
     * @var PriceRepository
     */
    protected $price;

    /**
     * @var ProductVersionPriceRepository
     */
    protected $productVersionPrice;

    /**
     * @var CurrencyRepository
     */
    protected $currency;

    /**
     * @var PriceTypeRepository
     */
    protected $priceType;

    /**
     * @var UnitRepository
     */
    protected $unit;

    /**
     * @var ProductVersionRepository
     */
    protected $productVersion;


    public function __construct(
        PriceRepository $price,
        ProductVersionPriceRepository $productVersionPrice,
        CurrencyRepository $currency,
        PriceTypeRepository $priceType,
        UnitRepository $unit,
        ProductVersionRepository $productVersion
    ) {
        parent::__construct();

        $this->price = $price;
        $this->productVersionPrice = $productVersionPrice;
        $this->currency = $currency;
        $this->priceType = $priceType;
        $this->unit = $unit;
        $this->productVersion = $productVersion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->price->all();

        return view('price::admin.prices.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Price $price)
    {
        $variables = [
            'price' => $price,
            'productVersionPrices' => $this->productVersionPrice->all(),
            'currencies' => $this->currency->all(),
            'priceTypes' => $this->priceType->all(),
            'units' => $this->unit->all(),
            'productVersions' => $this->productVersion->all(),
        ];

        return view('price::admin.prices.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->price->create($request->all());

        flash()->success(trans('core::core.messages.resource created',
            ['name' => trans('price::prices.title.prices')]));

        return redirect()->route(strtolower('admin.price.price.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Price $price
     * @return Response
     */
    public function edit(Price $price)
    {
        $variables = [
            'price' => $price,
            'productVersionPrices' => $this->productVersionPrice->all(),
            'currencies' => $this->currency->all(),
            'priceTypes' => $this->priceType->all(),
            'units' => $this->unit->all(),
            'productVersions' => $this->productVersion->all(),
        ];

        return view('price::admin.prices.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Price $price
     * @param  Request $request
     * @return Response
     */
    public function update(Price $price, Request $request)
    {
        $this->price->update($price, $request->all());

        flash()->success(trans('core::core.messages.resource updated',
            ['name' => trans('price::prices.title.prices')]));

        return redirect()->route(strtolower('admin.price.price.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Price $price
     * @return Response
     */
    public function destroy(Price $price)
    {
        $this->price->destroy($price);

        flash()->success(trans('core::core.messages.resource deleted',
            ['name' => trans('price::prices.title.prices')]));

        return redirect()->route(strtolower('admin.price.price.index'));
    }
}
