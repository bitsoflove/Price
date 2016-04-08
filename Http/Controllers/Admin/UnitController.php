<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\Unit;
use Modules\Price\Repositories\PriceRepository;
use Modules\Price\Repositories\UnitRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class UnitController extends AdminBaseController
{
    /**
     * @var UnitRepository
     */
    protected $unit;

    /**
     * @var PriceRepository
     */
    protected $price;


    public function __construct(
        UnitRepository $unit,
        PriceRepository $price
    ) {
        parent::__construct();

        $this->unit = $unit;
        $this->price = $price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->unit->all();

        return view('price::admin.units.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Unit $unit)
    {
        $variables = [
            'unit' => $unit,
            'prices' => $this->price->all(),
        ];

        return view('price::admin.units.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->unit->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('price::units.title.units')]));

        return redirect()->route(strtolower('admin.price.unit.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Unit $unit
     * @return Response
     */
    public function edit(Unit $unit)
    {
        $variables = [
            'unit' => $unit,
            'prices' => $this->price->all(),
        ];

        return view('price::admin.units.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Unit $unit
     * @param  Request $request
     * @return Response
     */
    public function update(Unit $unit, Request $request)
    {
        $this->unit->update($unit, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('price::units.title.units')]));

        return redirect()->route(strtolower('admin.price.unit.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Unit $unit
     * @return Response
     */
    public function destroy(Unit $unit)
    {
        $this->unit->destroy($unit);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('price::units.title.units')]));

        return redirect()->route(strtolower('admin.price.unit.index'));
    }
}
