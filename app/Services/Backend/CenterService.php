<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\CenterRepository as Center;

/* 配送中心服务层 */
class CenterService
{
    /**
     * @desc:   配送中心列表
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @return: data
     */
    public function centers(array $params)
    {
        return Center::centers($params);
    }

    /**
     * @desc:   添加配送中心
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:05
     * @param:
     * @return: array
     */
    public function centerCreate(array $params)
    {
        return Center::centerCreate($params);
    }

    /**
     * @desc:   删除配送中心
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: boolean
     */
    public function centerDestroy(array $params)
    {
        return Center::centerDestroy($params);
    }

    /**
     * @desc:   修改配送中心
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: boolean
     */
    public function centerUpdate(array $params)
    {
        return Center::centerUpdate($params);
    }

}