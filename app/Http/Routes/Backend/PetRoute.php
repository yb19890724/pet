<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 宠物 */
class PetRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/pet','PetController');
        $router->get('/pets','PetController@getPetAll');
    }
}


