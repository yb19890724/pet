<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\CenterModel;
use Facades\App\Transformer\Backend\CenterTransform as Center;

/* 配送中心仓库层 */
class CenterRepository extends BaseRepository
{
    public $bindModel = CenterModel::class;//绑定模型


    /**
     * @desc:   查询卡券列表
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: array
     */
    public function centers(array $params)
    {
        return $this->model->centers($params,'centers');
    }

    /**
     * @desc:   添加卡券类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: boolean
     */
    public function centerCreate(array $params)
    {
        return $result=$this->model->create($params);
    }

    /**
     * @desc:   删除卡券类型
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:  $params['id']  数据id
     * @return: boolean
     */
    public function centerDestroy(array $params)
    {
        return $this->model->destroy($params);
    }

    /**
     * @desc:   修改卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: bool
     */
    public function centerUpdate(array $params)
    {
        list($where,$attributes)=Center::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}