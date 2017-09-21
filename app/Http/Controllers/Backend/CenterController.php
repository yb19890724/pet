<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\CenterService;

/* 配送中心控制器 */
class CenterController extends BackendController
{
    private $center;

    public function __construct(CenterService $Center)
    {
        $this->center=$Center;
    }

    /**
     * @desc:   中心列表
     * @auth:   hyb
     * @date:   2017/9/21
     * @time:   16:45
     * @param:
     * @return: json
     */
    public function centers(int $page, int $size)
    {
        $result = $this->center->centers(compact('page', 'size'));
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
    }


    public function centerCreate(Request $request)
    {
        $result = $this->center->centerCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
    }


    public function centerDestroy(int $id)
    {
        $result=$this->center->centerDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    public function centerUpdate(Request $request, int $id)
    {
        $result = $this->center->centerUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}