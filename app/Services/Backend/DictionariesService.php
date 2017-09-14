<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\DictionaryRepository as Dictionary;

/* 字典服务层 */
class DictionaryService
{
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
        return Dictionary::dictionaryCreate($params);
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
        return Dictionary::dictionaryDestroy($params);
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
        return Dictionary::dictionaryUpdate($params);
    }
}