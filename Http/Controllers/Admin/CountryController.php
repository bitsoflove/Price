<?php namespace Modules\Price\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Price\Entities\Country;
use Modules\Price\Repositories\CountryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Price\Repositories\PriceTypeVatRepository;

class CountryController extends AdminBaseController
{
    /**
     * @var CountryRepository
     */
    protected $country;

    protected $priceTypeVat;

    public function __construct(
        CountryRepository $country,
        PriceTypeVatRepository $priceTypeVat
    ) {
        parent::__construct();

        $this->country = $country;
        $this->priceTypeVat = $priceTypeVat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->country->all();

        return view('price::admin.countries.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Country $country)
    {
        $variables = [
            'country' => $country,
            'priceTypeVats' => $this->priceTypeVat->all(),
        ];

        return view('price::admin.countries.create', $variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->country->create($request->all());

        flash()->success(trans('core::core.messages.resource created',
            ['name' => trans('price::countries.title.countries')]));

        return redirect()->route(strtolower('admin.price.country.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Country $country
     * @return Response
     */
    public function edit(Country $country)
    {
        $variables = [
            'country' => $country,
            'priceTypeVats' => $this->priceTypeVat->all(),
        ];

        return view('price::admin.countries.edit', $variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Country $country
     * @param  Request $request
     * @return Response
     */
    public function update(Country $country, Request $request)
    {
        $this->country->update($country, $request->all());

        flash()->success(trans('core::core.messages.resource updated',
            ['name' => trans('price::countries.title.countries')]));

        return redirect()->route(strtolower('admin.price.country.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country $country
     * @return Response
     */
    public function destroy(Country $country)
    {
        $this->country->destroy($country);

        flash()->success(trans('core::core.messages.resource deleted',
            ['name' => trans('price::countries.title.countries')]));

        return redirect()->route(strtolower('admin.price.country.index'));
    }
}
