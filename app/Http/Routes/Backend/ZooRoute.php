<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 宠物 */
class zooRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/zoo','ZooController');
        $router->get('/zoos','ZooController@getZooAll');
    }
}


