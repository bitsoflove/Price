<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\PriceTypeVat;
use Modules\Countries\Repositories\CountryRepository;
use Modules\Price\Repositories\PriceTypeRepository;
use Modules\Price\Repositories\PriceTypeVatRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Price\Repositories\VatRepository;

class PriceTypeVatController extends AdminBaseController
{
    /**
     * @var PriceTypeVatRepository
     */
    protected $priceTypeVat;

    /**
     * @var CountryRepository
     */
    protected $country;

    /**
     * @var PriceTypeRepository
     */
    protected $priceType;

    /**
     * @var VatRepository
     */
    protected $vat;


    public function __construct(
        PriceTypeVatRepository $priceTypeVat,
        PriceTypeRepository $priceType,
        VatRepository $vat,
        CountryRepository $country
    ) {
        parent::__construct();

        $this->priceTypeVat = $priceTypeVat;
        $this->priceType = $priceType;
        $this->vat = $vat;
        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->priceTypeVat->allFullyLoaded();

        return view('price::admin.price_type_vats.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(PriceTypeVat $priceTypeVat)
    {
        $variables = [
            'priceTypeVat' => $priceTypeVat,
            'priceTypes' => $this->priceType->all(),
            'vats' => $this->vat->all(),
            'countries' => $this->country->all(),
        ];

        return view('price::admin.price_type_vats.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->priceTypeVat->create($request->all());

        flash()->success(trans('core::core.messages.resource created',
            ['name' => trans('price::priceTypeVats.title.priceTypeVats')]));

        return redirect()->route(strtolower('admin.price.priceTypeVat.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PriceTypeVat $priceTypeVat
     * @return Response
     */
    public function edit(PriceTypeVat $priceTypeVat)
    {
        $variables = [
            'priceTypeVat' => $priceTypeVat,
            'priceTypes' => $this->priceType->all(),
            'vats' => $this->vat->all(),
            'countries' => $this->country->all(),
        ];

        return view('price::admin.price_type_vats.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PriceTypeVat $priceTypeVat
     * @param  Request $request
     * @return Response
     */
    public function update(PriceTypeVat $priceTypeVat, Request $request)
    {
        $this->priceTypeVat->update($priceTypeVat, $request->all());

        flash()->success(trans('core::core.messages.resource updated',
            ['name' => trans('price::priceTypeVats.title.priceTypeVats')]));

        return redirect()->route(strtolower('admin.price.priceTypeVat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PriceTypeVat $priceTypeVat
     * @return Response
     */
    public function destroy(PriceTypeVat $priceTypeVat)
    {
        $this->priceTypeVat->destroy($priceTypeVat);

        flash()->success(trans('core::core.messages.resource deleted',
            ['name' => trans('price::priceTypeVats.title.priceTypeVats')]));

        return redirect()->route(strtolower('admin.price.priceTypeVat.index'));
    }
}
