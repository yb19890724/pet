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

}