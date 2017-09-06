<?php

namespace App\Transforms\Backend;

use App\Transforms\Transform;

/* 优惠券映射类 */

class CouponTypeTransform extends Transform
{
    protected $where = ['id'];//参数条件

    protected $attributes = ['title','body'];//属性


}