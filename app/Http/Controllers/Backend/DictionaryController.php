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
    public function dictionaryCreate(Request $request)
    {
        $result = $this->dictionary->dictionaryCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
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
        $result=$this->dictionary->dictionaryDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    /**
     * @desc:   修改字典配置
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   18:02
     * @param:
     * @return: json
     */
    public function dictionaryUpdate(Request $request, int $id)
    {
        $result = $this->dictionary->dictionaryUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}