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
}