<?php

namespace App\Transformer\Backend;

use App\Transformer\Transform;

/* 优惠券映射类 */

class CouponTypeTransform extends Transform
{
    protected $where = ['id'];//参数条件

    protected $attributes = ['name','buy_price'];//属性


}