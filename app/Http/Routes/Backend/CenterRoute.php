<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 配送中心路由 */
class CenterRoute
{
    public function map(Registrar $router)
    {
        $router->get('/center/{page}/{size}','CenterController@centers');
        $router->post('/center','CenterController@centerCreate');
        $router->delete('/center/{id}','CenterController@centerDestroy');
        $router->put('/center/{id}','CenterController@centerUpdate');
    }
}


