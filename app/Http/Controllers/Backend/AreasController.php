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
}