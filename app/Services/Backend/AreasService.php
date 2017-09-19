<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\AreasRepository as Areas;

/* 地区服务层 */
class AreasService
{
    /**
     * @desc:   地区树形数据
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @return: data
     */
    public function areasTrees(array $params)
    {
        return Areas::areasTrees($params);
    }

    /**
     * @desc:   添加地区
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   10:05
     * @param:
     * @return: array
     */
    public function areaCreate(array $params)
    {
        return Areas::areaCreate($params);
    }

    /**
     * @desc:   删除地区
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: boolean
     */
    public function areaDestroy(array $params)
    {
        return Areas::areaDestroy($params);
    }

    /**
     * @desc:   修改地区
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:30
     * @param:
     * @return: boolean
     */
    public function areaUpdate(array $params)
    {
        return Areas::areaUpdate($params);
    }
}