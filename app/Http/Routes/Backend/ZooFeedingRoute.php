<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 宠物 */
class ZooFeedingRoute
{
    public function map(Registrar $router)
    {
        $router->get('/zoo/{id}/feeding','ZooFeedingController@getZooFeedings');
        $router->post('/zoo/feeding','ZooFeedingController@store');
        $router->put('/zoo/feeding/{id}','ZooFeedingController@update');
        $router->delete('/zoo/feeding/{id}','ZooFeedingController@delete');
        $router->get('/zoo/feeding/{id}','ZooFeedingController@show');
    }
}


