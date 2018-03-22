<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class ZooGrowthRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/zoo/growth','ZooGrowthController');
    }
}


