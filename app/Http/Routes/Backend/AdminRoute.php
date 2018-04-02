<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 管理员 */
class AdminRoute
{
    public function map(Registrar $router)
    {
        $router->get('/admin','AdminController@getAdmin');
    }
}


