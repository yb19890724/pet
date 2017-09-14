<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\CouponTypeModel;
use Facades\App\Transformer\Backend\CouponTypeTransform as CouponType;

/* 卡券类型仓库层 */
class CouponTypeRepository extends BaseRepository
{

    public $bindModel = CouponTypeModel::class;//绑定模型

    /**
     * @desc:   查询卡券列表
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: array
     */
    public function couponTypes(array $params)
    {
        return $this->model->couponTypes($params);
    }

    /**
     * @desc:   添加卡券类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: boolean
     */
    public function couponTypeCreate(array $params)
    {
        return $result=$this->model->insertGetId($params);
    }

    /**
     * @desc:   删除卡券类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:
     * @return:
     */
    public function couponTypeDestroy(array $params)
    {
        return $this->model->conditionsDelete($params);
    }

    /**
     * @desc:   修改卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: bool
     */
    public function couponTypeUpdate(array $params)
    {
        list($where,$attributes)=CouponType::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}