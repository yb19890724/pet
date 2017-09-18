<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\AreaService;

/* 地区控制器 */

class AreaController extends BackendController
{
    private $area;

    public function __construct(AreaService $Area)
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
    public function areaTrees()
    {
        $result = $this->area->areaTrees([]);
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
    }
}