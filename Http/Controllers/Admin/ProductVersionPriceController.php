<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\ProductVersionPrice;
use Modules\Price\Repositories\PriceRepository;
use Modules\Price\Repositories\ProductVersionPriceRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Product\Repositories\ProductVersionRepository;

class ProductVersionPriceController extends AdminBaseController
{
    /**
     * @var ProductVersionPriceRepository
     */
    protected $productVersionPrice;

    protected $productVersion;
    protected $price;


    public function __construct(
        ProductVersionPriceRepository $productVersionPrice,
        ProductVersionRepository $productVersion,
        PriceRepository $price
    ) {
        parent::__construct();

        $this->productVersionPrice = $productVersionPrice;
        $this->productVersion = $productVersion;
        $this->price = $price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->productVersionPrice->all();

        return view('price::admin.product_version_prices.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(ProductVersionPrice $productVersionPrice)
    {
        $variables = [
            'productVersionPrice' => $productVersionPrice,
            'prices' => $this->price->all(),
            'productVersions' => $this->productVersion->all(),
        ];

        return view('price::admin.product_version_prices.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->productVersionPrice->create($request->all());

        flash()->success(trans('core::core.messages.resource created',
            ['name' => trans('price::productVersionPrices.title.productVersionPrices')]));

        return redirect()->route(strtolower('admin.price.productVersionPrice.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductVersionPrice $productVersionPrice
     * @return Response
     */
    public function edit(ProductVersionPrice $productVersionPrice)
    {
        $variables = [
            'productVersionPrice' => $productVersionPrice,
            'prices' => $this->price->all(),
            'productVersions' => $this->productVersion->all(),
        ];

        return view('price::admin.product_version_prices.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductVersionPrice $productVersionPrice
     * @param  Request $request
     * @return Response
     */
    public function update(ProductVersionPrice $productVersionPrice, Request $request)
    {
        $this->productVersionPrice->update($productVersionPrice, $request->all());

        flash()->success(trans('core::core.messages.resource updated',
            ['name' => trans('price::productVersionPrices.title.productVersionPrices')]));

        return redirect()->route(strtolower('admin.price.productVersionPrice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductVersionPrice $productVersionPrice
     * @return Response
     */
    public function destroy(ProductVersionPrice $productVersionPrice)
    {
        $this->productVersionPrice->destroy($productVersionPrice);

        flash()->success(trans('core::core.messages.resource deleted',
            ['name' => trans('price::productVersionPrices.title.productVersionPrices')]));

        return redirect()->route(strtolower('admin.price.productVersionPrice.index'));
    }
}
