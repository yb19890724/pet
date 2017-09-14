<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class CouponTypeRoute
{
    public function map(Registrar $router)
    {
        $router->get('/coupon/types/{page}/{size}','CouponTypeController@couponTypes');
        $router->post('/coupon/type','CouponTypeController@couponTypeCreate');
        $router->delete('/coupon/type/{id}','CouponTypeController@couponTypeDestroy');
        $router->put('/coupon/type/{id}','CouponTypeController@couponTypeUpdate');
    }
}


