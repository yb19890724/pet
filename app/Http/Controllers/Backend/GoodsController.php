<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\GoodsService;

/* 商品控制器 */

class GoodsController extends BackendController
{
    private $goods;

    public function __construct(GoodsService $Goods)
    {
        $this->goods=$Goods;
    }


    /**
     * @desc:   商品列表方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @param:  $page  当前页
     * @param:  $size  返回记录
     * @return: json
     */
    public function goods(int $page, int $size)
    {
        $result = $this->goods->goods(compact('page', 'size'));
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
    }

    /**
     * @desc:   添加商品接口
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:04
     * @param:
     * @return: json
     */
    public function goodsCreate(Request $request)
    {
        $result = $this->goods->goodsCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
    }

    /**
     * @desc:   删除商品
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   16:58
     * @param:
     * @return: json
     */
    public function goodsDestroy(int $id)
    {
        $result=$this->goods->goodsDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    /**
     * @desc:   修改商品
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   18:02
     * @param:
     * @return: json
     */
    public function goodsUpdate(Request $request, int $id)
    {
        $result = $this->goods->goodsUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}