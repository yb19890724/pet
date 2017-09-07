<?php

namespace App\Http\Routes\TenantBackend;

use Illuminate\Contracts\Routing\Registrar;

class couponTypeRoute
{
    public function map(Registrar $router)
    {
        $router->get('/test/test',function(){
            echo '測試111111';
        });
    }
}


