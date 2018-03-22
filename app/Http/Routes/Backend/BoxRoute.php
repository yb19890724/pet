<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 饲养箱 */
class BoxRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/box','PetBoxController');
        $router->get('/boxes','PetBoxController@getPetBoxesAll');
    }
}


