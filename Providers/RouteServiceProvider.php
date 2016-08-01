<?php

namespace Modules\Price\Providers;

use Modules\Core\Providers\RoutingServiceProvider as CoreRoutingServiceProvider;

class RouteServiceProvider extends CoreRoutingServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $namespace = 'Modules\Price\Http\Controllers';

    /**
     * @return string
     */
    protected function getFrontendRoute()
    {
        return __DIR__.'/../Http/apiRoutes.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        return __DIR__.'/../Http/backendRoutes.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return false;
    }
}
