<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\AreasService;

/* 地区控制器 */

class AreasController extends BackendController
{
    private $area;

    public function __construct(AreasService $Area)
    {
        $this->area=$Area;
    }

    /**
     * @desc:   地区树形数据
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @return: json
     */
    public function areasTrees()
    {
        $result = $this->area->areasTrees([]);
        if (!empty($result)) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
    }

    /**
     * @desc:   添加地区接口
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:04
     * @param:
     * @return: json
     */
    public function areaCreate(Request $request)
    {
        $result = $this->area->areaCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
    }

    /**
     * @desc:   删除地区接口
     * @auth:   hyb
     * @date:   2017/9/19
     * @time:   9:43
     * @param:
     * @return: json
     */
    public function areaDestroy(int $id)
    {
        $result=$this->area->areaDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    /**
     * @desc:   修改地区
     * @auth:   hyb
     * @date:   2017/9/19
     * @time:   9:43
     * @param:
     * @return:
     */
    public function areaUpdate(Request $request, int $id)
    {
        $result = $this->area->areaUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }

}