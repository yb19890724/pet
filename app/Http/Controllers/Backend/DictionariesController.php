<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\DictionariesService;

/* 字典控制器 */

class DictionariesController extends BackendController
{
    private $dictionaries;

    public function __construct(DictionariesService $Dictionaries)
    {
        $this->dictionaries = $Dictionaries;
    }

    /**
     * @desc:   字典类型列表
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   9:28
     * @param:
     * @return: json
     */
    public function dictionaries(Request $request, int $page, int $size)
    {
        $result = $this->dictionaries->dictionaries(array_merge($request->all(), compact('page', 'size')));
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
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
        $result = $this->dictionaries->dictionaryCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse(trans('global.create.fail'));
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
        $result = $this->dictionaries->dictionaryDestroy(compact('id'));
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
        $result = $this->dictionaries->dictionaryUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}