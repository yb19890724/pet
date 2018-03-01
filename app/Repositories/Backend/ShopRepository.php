<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\ShopModel;
use Facades\App\Transformer\Backend\ShopTransform as Shop;

/* 店铺仓库层 */
class ShopRepository extends BaseRepository
{
    public $bindModel = ShopModel::class;//绑定模型

    /**
     * @desc:   店铺列表
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: array
     */
    public function shops(array $params)
    {
        return $this->model->shops($params);
    }

    /**
     * @desc:   添加店铺
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: boolean
     */
    public function shopCreate(array $params)
    {
        return $result=$this->model->create($params);
    }

    /**
     * @desc:   删除店铺
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:
     * @return:
     */
    public function shopDestroy(array $params)
    {
        return $this->model->destroy($params);
    }

    /**
     * @desc:   修改店铺
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: bool
     */
    public function shopUpdate(array $params)
    {
        list($where,$attributes)=Shop::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}