<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\Vat;
use Modules\Price\Repositories\PriceTypeVatRepository;
use Modules\Price\Repositories\VatRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class VatController extends AdminBaseController
{
    /**
     * @var VatRepository
     */
    protected $vat;

    /**
     * @var PriceTypeVatRepository
     */
    protected $priceTypeVat;

    public function __construct(
        VatRepository $vat,
        PriceTypeVatRepository $priceTypeVat
    ) {
        parent::__construct();

        $this->vat = $vat;
        $this->priceTypeVat = $priceTypeVat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->vat->all();

        return view('price::admin.vats.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Vat $vat)
    {
        $variables = [
            'vat' => $vat,
            'priceTypeVats' => $this->priceTypeVat->all(),
        ];

        return view('price::admin.vats.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->vat->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('price::vats.title.vats')]));

        return redirect()->route(strtolower('admin.price.vat.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vat $vat
     * @return Response
     */
    public function edit(Vat $vat)
    {
        $variables = [
            'vat' => $vat,
            'priceTypeVats' => $this->priceTypeVat->all(),
        ];

        return view('price::admin.vats.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Vat $vat
     * @param  Request $request
     * @return Response
     */
    public function update(Vat $vat, Request $request)
    {
        $this->vat->update($vat, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('price::vats.title.vats')]));

        return redirect()->route(strtolower('admin.price.vat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vat $vat
     * @return Response
     */
    public function destroy(Vat $vat)
    {
        $this->vat->destroy($vat);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('price::vats.title.vats')]));

        return redirect()->route(strtolower('admin.price.vat.index'));
    }
}
