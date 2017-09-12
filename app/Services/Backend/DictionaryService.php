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
}