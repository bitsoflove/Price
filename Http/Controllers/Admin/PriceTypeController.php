<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\PriceType;
use Modules\Price\Entities\PriceTypeVat;
use Modules\Price\Repositories\PriceRepository;
use Modules\Price\Repositories\PriceTypeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Price\Repositories\PriceTypeVatRepository;

class PriceTypeController extends AdminBaseController
{
    /**
     * @var PriceTypeRepository
     */
    protected $priceType;

    protected $priceTypeVat;

    protected $price;

    public function __construct(
        PriceTypeRepository $priceType,
        PriceTypeVatRepository $priceTypeVat,
        PriceRepository $price
    ) {
        parent::__construct();

        $this->priceType = $priceType;
        $this->priceTypeVat = $priceTypeVat;
        $this->price = $price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->priceType->all();

        return view('price::admin.price_types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(PriceType $priceType)
    {
        $variables = [
            'priceType' => $priceType,
            'priceTypeVats' => $this->priceTypeVat->all(),
            'prices' => $this->price->all(),
        ];

        return view('price::admin.price_types.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->priceType->create($request->all());

        flash()->success(trans('core::core.messages.resource created',
            ['name' => trans('price::priceTypes.title.priceTypes')]));

        return redirect()->route(strtolower('admin.price.priceType.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PriceType $priceType
     * @return Response
     */
    public function edit(PriceType $priceType)
    {
        $variables = [
            'priceType' => $priceType,
            'priceTypeVats' => $this->priceTypeVat->all(),
            'prices' => $this->price->all(),
        ];

        return view('price::admin.price_types.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PriceType $priceType
     * @param  Request $request
     * @return Response
     */
    public function update(PriceType $priceType, Request $request)
    {
        $this->priceType->update($priceType, $request->all());

        flash()->success(trans('core::core.messages.resource updated',
            ['name' => trans('price::priceTypes.title.priceTypes')]));

        return redirect()->route(strtolower('admin.price.priceType.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PriceType $priceType
     * @return Response
     */
    public function destroy(PriceType $priceType)
    {
        $this->priceType->destroy($priceType);

        flash()->success(trans('core::core.messages.resource deleted',
            ['name' => trans('price::priceTypes.title.priceTypes')]));

        return redirect()->route(strtolower('admin.price.priceType.index'));
    }
}
