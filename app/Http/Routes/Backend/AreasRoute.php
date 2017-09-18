<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 地区路由 */
class AreasRoute
{
    public function map(Registrar $router)
    {
        $router->get('/areas/{page}/{size}','AreasController@areas');
        $router->get('/areas/trees','AreasController@areasTrees');
        $router->post('/area','AreasController@areaCreate');
        $router->delete('/area/{id}','AreasController@areaDestroy');
        $router->put('/area/{id}','AreasController@areaUpdate');
    }
}


