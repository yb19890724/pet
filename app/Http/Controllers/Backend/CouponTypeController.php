<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Backend\CouponTypeService;

/* 卡券类型控制器 */
class CouponTypeController extends Controller
{
    private $couponType;

    public function __construct(CouponTypeService $CouponType)
    {
        $this->couponType=$CouponType;
    }

    public function test()
    {
        $this->couponType->test();
    }
}