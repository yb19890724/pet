<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 基因模块 */
class GeneRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/gene','GeneController');
        $router->get('/genes','GeneController@getGentAll');
    }
}


