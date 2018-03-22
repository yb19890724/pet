<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class PetGrowthRoute
{
    public function map(Registrar $router)
    {
        $router->get('/pet/{pet_id}/growths','PetGrowthController@getPetGrowths');
        $router->get('/pet/growth/{id}','PetGrowthController@show');
        $router->post('/pet/growth','PetGrowthController@store');
        $router->delete('/pet/growth/{id}','PetGrowthController@destroy');
        $router->put('/pet/growth/{id}','PetGrowthController@update');
    }
}


