<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 宠物 */
class PetFeedingRoute
{
    public function map(Registrar $router)
    {
        $router->get('/pet/{id}/feedings','PetFeedingController@getPetFeedings');
        $router->post('/pet/feeding','PetFeedingController@store');
        $router->put('/pet/feeding/{id}','PetFeedingController@update');
        $router->delete('/pet/feeding/{id}','PetFeedingController@delete');
        $router->get('/pet/feeding/{id}','PetFeedingController@show');
    }
}


