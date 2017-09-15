<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\DictionariesRepository as Dictionaries;

/* 字典服务层 */
class DictionariesService
{

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
        return Dictionaries::dictionaries($params);
    }

    /**
     * @desc:   添加字典配置
     * @auth:   hyb
     * @date:   2017/9/12
     * @time:   18:01
     * @param:
     * @return: array
     */
    public function dictionaryCreate($params)
    {
        return Dictionaries::dictionaryCreate($params);
    }

    /**
     * @desc:   删除字典
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   9:12
     * @param:
     * @return:
     */
    public function dictionaryDestroy($params)
    {
        return Dictionaries::dictionaryDestroy($params);
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
        return Dictionaries::dictionaryUpdate($params);
    }
}