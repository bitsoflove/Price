<?php namespace Modules\Price\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group('price', function (Group $group) {
            $group->item(trans('price::currencies.title.currencies'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-camera');
                $item->route('admin.price.currency.index');
                $item->authorize(
                    $this->auth->hasAccess('price.currencies.index')
                );
            });
            $group->item(trans('price::pricetypes.title.pricetypes'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-camera');
                $item->route('admin.price.pricetype.index');
                $item->authorize(
                    $this->auth->hasAccess('price.pricetypes.index')
                );
            });
            $group->item(trans('price::units.title.units'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-camera');
                $item->route('admin.price.unit.index');
                $item->authorize(
                    $this->auth->hasAccess('price.units.index')
                );
            });
            $group->item(trans('price::prices.title.prices'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-camera');
                $item->route('admin.price.price.index');
                $item->authorize(
                    $this->auth->hasAccess('price.prices.index')
                );
            });
//            $group->item(trans('price::productversionprices.title.productversionprices'), function (Item $item) {
//                $item->weight(2);
//                $item->icon('fa fa-camera');
//                $item->route('admin.price.productversionprice.index');
//                $item->authorize(
//                    $this->auth->hasAccess('price.productversionprices.index')
//                );
//            });
            $group->item(trans('price::vats.title.vats'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-camera');
                $item->route('admin.price.vat.index');
                $item->authorize(
                    $this->auth->hasAccess('price.vats.index')
                );
            });
            $group->item(trans('price::pricetypevats.title.pricetypevats'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-camera');
                $item->route('admin.price.pricetypevat.index');
                $item->authorize(
                    $this->auth->hasAccess('price.pricetypevats.index')
                );
            });

        });

        return $menu;
    }
}
