<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\DictionaryModel;
use Facades\App\Transformer\Backend\DictionaryTransform as Dictionary;

/* 字典仓库层 */
class DictionaryRepository extends BaseRepository
{
    public $bindModel = DictionaryModel::class;//绑定模型


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
        return $result=$this->model->insertGetId($params);
    }

    /**
     * @desc:   删除字典
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:43
     * @param:
     * @return:
     */
    public function dictionaryDestroy(array $params)
    {
        return $this->model->conditionsDelete($params);
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
        return $this->model->conditionsUpdate($params);
    }
}