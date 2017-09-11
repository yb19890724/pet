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
}