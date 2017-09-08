<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\CouponTypeRepository as CouponType;

/* 卡券类型服务层 */
class CouponTypeService
{

    /**
     * @desc:   查询卡券列表
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:05
     * @param:
     * @return: array
     */
    public function couponTypes(array $params)
    {
        return CouponType::couponTypes($params);
    }

    /**
     * @desc:   添加卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:05
     * @param:
     * @return: array
     */
    public function couponTypeCreate(array $params)
    {
        return CouponType::couponTypeCreate($params);
    }

    /**
     * @desc:   删除卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return:
     */
    public function couponTypeDestroy(array $params)
    {
        return CouponType::couponTypeDestroy($params);
    }

    /**
     * @desc:   修改卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return:
     */
    public function couponTypeUpdate(array $params)
    {
        return CouponType::couponTypeUpdate($params);
    }
}