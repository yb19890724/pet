<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\DictionariesModel;
use Facades\App\Transformer\Backend\DictionariesTransform as Dictionaries;

/* 字典仓库层 */
class DictionariesRepository extends BaseRepository
{
    public $bindModel = DictionariesModel::class;//绑定模型

    /**
     * @desc:   字典类型列表
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   9:28
     * @param:
     * @return: json
     */
    public function dictionaries(array $params)
    {
        return $this->model->dictionaries($params,'dictionaries');
    }

    /**
     * @desc:   返回全部字典
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   12:59
     * @param:
     * @return: collection
     */
    public function dictionaryAll($params){
        return $this->model->dictionariesAll($params);
    }

    /**
     * @desc:   添加字典
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:07
     * @param:
     * @return: boolean
     */
    public function dictionaryCreate(array $params)
    {

        return $this->model->create($params);
    }

    /**
     * @desc:   删除字典
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:
     * @return:
     */
    public function dictionaryDestroy(int $params)
    {
        return $this->model->destroy($params);
    }

    /**
     * @desc:   修改字典
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   9:12
     * @param:
     * @return:
     */
    public function dictionaryUpdate(array $params)
    {
        list($where,$attributes)=Dictionaries::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}