<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\AreasModel;
use Facades\App\Transformer\Backend\AreasTransform as Areas;

/* 地区仓库层 */
class AreasRepository extends BaseRepository
{
    public $bindModel = AreasModel::class;//绑定模型

    /**
     * @desc:   地区树形数据
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @return: array
     */
    public function areasTrees(array $params)
    {
        return Areas::areaTrees($this->model->areasAll('areasTrees')->toArray());
    }

    /**
     * @desc:   添加地区类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: boolean
     */
    public function areaCreate(array $params)
    {
        return $result=$this->model->create($params);
    }

    /**
     * @desc:   删除地区类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:
     * @return:
     */
    public function areaDestroy(array $params)
    {
        return $this->model->conditionsDelete($params);
    }

    /**
     * @desc:   修改地区
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: bool
     */
    public function areaUpdate(array $params)
    {
        list($where,$attributes)=Areas::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}