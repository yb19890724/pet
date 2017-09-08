<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\CouponTypeService;

/* 卡券类型控制器 */

class CouponTypeController extends BackendController
{
    private $couponType;

    public function __construct(CouponTypeService $CouponType)
    {
        $this->couponType = $CouponType;
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
    public function couponTypes(int $page, int $size)
    {
        $result = $this->couponType->couponTypes(compact('page', 'size'));
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
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
        $result = $this->couponType->couponTypeCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
    }

    /**
     * @desc:   删除卡券类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   16:58
     * @param:
     * @return: array
     */
    public function couponTypeDestroy(int $id)
    {
        $result=$this->couponType->couponTypeDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    /**
     * @desc:   修改卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   18:02
     * @param:
     * @return:
     */
    public function couponTypeUpdate(Request $request, int $id)
    {
        $result = $this->couponType->couponTypeUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}