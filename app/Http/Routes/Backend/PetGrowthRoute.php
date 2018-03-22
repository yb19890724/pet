<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class PetGrowthRoute
{
    public function map(Registrar $router)
    {
        $router->get('/zoo/{zoo_id}/growths','ZooGrowthController@getZooGrowths');
        $router->get('/zoo/growth/{id}','ZooGrowthController@show');
        $router->post('/zoo/growth','ZooGrowthController@store');
        $router->delete('/zoo/growth/{id}','ZooGrowthController@destroy');
        $router->put('/zoo/growth/{id}','ZooGrowthController@update');
    }
}


