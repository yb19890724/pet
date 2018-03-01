<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\ShopRepository as Shop;

/* 店铺服务层 */
class ShopService
{

    /**
     * @desc:   店铺列表
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   14:57
     * @param:
     * @return:
     */
    public function shop(array $params)
    {
        return Shop::shop($params);
    }

    /**
     * @desc:   添加店铺接口
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   14:58
     * @param:
     * @return:
     */
    public function shopCreate(array $params)
    {
        return Shop::shopCreate($params);
    }

    /**
     * @desc:   删除店铺接口
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   14:59
     * @param:
     * @return:
     */
    public function shopDestroy(array $params)
    {
        return Shop::shopDestroy($params);
    }

    /**
     * @desc:   修改店铺
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   15:00
     * @param:
     * @return:
     */
    public function shopUpdate(array $params)
    {
        return Shop::shopUpdate($params);
    }

}