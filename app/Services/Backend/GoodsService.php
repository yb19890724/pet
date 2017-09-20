<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\GoodsRepository as Goods;

/* 商品服务层 */
class GoodsService
{

    /**
     * @desc:   商品列表
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   14:57
     * @param:
     * @return:
     */
    public function goods(array $params)
    {
        return Goods::Goods($params);
    }

    /**
     * @desc:   添加商品接口
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   14:58
     * @param:
     * @return:
     */
    public function goodsCreate(array $params)
    {
        return Goods::goodsCreate($params);
    }
    
    /**
     * @desc:   删除商品接口
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   14:59
     * @param: 
     * @return:
     */
    public function goodsDestroy(array $params)
    {
        return Goods::goodsDestroy($params);
    }

    /**
     * @desc:   修改商品
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   15:00
     * @param:
     * @return:
     */
    public function goodsUpdate(array $params)
    {
        return Goods::goodsUpdate($params);
    }
}