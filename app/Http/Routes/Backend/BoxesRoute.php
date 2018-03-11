<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 饲养箱 */
class BoxesRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/boxes','ZooBoxesController');
    }
}


