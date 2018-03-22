<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 宠物 */
class ZooFeedingRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/zoo/feeding','ZooFeedingController');
    }
}


