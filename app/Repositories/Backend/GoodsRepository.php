<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\GoodsModel;
use Facades\App\Transformer\Backend\GoodsTransform as Goods;

/* 商品仓库层 */
class GoodsRepository extends BaseRepository
{
    public $bindModel = GoodsModel::class;//绑定模型

    /**
     * @desc:   商品列表
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: array
     */
    public function goods(array $params)
    {
        return $this->model->goods($params);
    }

    /**
     * @desc:   添加商品
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: boolean
     */
    public function goodCreate(array $params)
    {
        return $result=$this->model->create($params);
    }

    /**
     * @desc:   删除商品
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:
     * @return:
     */
    public function goodDestroy(array $params)
    {
        return $this->model->destroy($params);
    }

    /**
     * @desc:   修改商品
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: bool
     */
    public function goodUpdate(array $params)
    {
        list($where,$attributes)=Goods::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}