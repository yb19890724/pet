<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\ShopService;

/* 店铺控制器 */

class ShopController extends BackendController
{
    private $shop;

    public function __construct(ShopService $Shop)
    {
        $this->shop=$Shop;
    }

    /**
     * @desc:   店铺列表方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @param:  $page  当前页
     * @param:  $size  返回记录
     * @return: json
     */
    public function shops(int $page, int $size)
    {
        $result = $this->shop->shops(compact('page', 'size'));
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
    }

    /**
     * @desc:   添加店铺接口
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:04
     * @param:
     * @return: json
     */
    public function shopCreate(Request $request)
    {
        $result = $this->shop->shopCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
    }

    /**
     * @desc:   删除店铺
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   16:58
     * @param:
     * @return: json
     */
    public function shopDestroy(int $id)
    {
        $result=$this->shop->shopDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    /**
     * @desc:   修改店铺
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   18:02
     * @param:
     * @return: json
     */
    public function shopUpdate(Request $request, int $id)
    {
        $result = $this->shop->shopUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}