<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class CouponTypeRoute
{
    public function map(Registrar $router)
    {
        $router->get('/coupon/types/{page}/{size}','Backend\CouponTypeController@couponTypes');
        $router->post('/coupon/type','Backend\CouponTypeController@couponTypeCreate');
        $router->delete('/coupon/type/{id}','Backend\CouponTypeController@couponTypeDestroy');
        $router->put('/coupon/type/{id}','Backend\CouponTypeController@couponTypeUpdate');
    }
}


