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

    /**
     * @desc:   卡券列表方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @param:  $page  当前页
     * @param:  $size  返回记录
     * @return: json
     */
    public function couponTypes($page,$size)
    {
        $result=$this->couponType->couponTypes(compact('page','size'));
        dd($result);
    }

    /**
     * @desc:   添加卡券接口
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:04
     * @param:
     * @return: json
     */
    public function couponTypeCreate(Request $request)
    {
        $this->couponType->couponTypeCreate($request->all());
    }

    /**
     * @desc:   删除卡券类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   16:58
     * @param:
     * @return: array
     */
    public function couponTypeDestroy($id)
    {
        echo $this->couponType->couponTypeDestroy(compact('id'));
    }

    /**
     * @desc:   修改卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   18:02
     * @param:
     * @return:
     */
    public function couponTypeUpdate(Request $request, $id)
    {
       echo $this->couponType->couponTypeUpdate(array_merge($request->all(),$id));
    }
}