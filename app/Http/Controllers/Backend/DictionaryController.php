<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\DictionaryService;

/* 字典控制器 */
class DictionaryController extends BackendController
{
    private $dictionary;

    public function __construct(DictionaryService $Dictionary)
    {
        $this->dictionary=$Dictionary;
    }

    /**
     * @desc:   添加字典配置
     * @auth:   hyb
     * @date:   2017/9/12
     * @time:   18:01
     * @param:
     * @return: json
     */
    public function dictionaryCreate()
    {

    }

    /**
     * @desc:   删除字典配置
     * @auth:   hyb
     * @date:   2017/9/12
     * @time:   18:01
     * @param:
     * @return: json
     */
    public function dictionaryDestroy($id)
    {

    }
}