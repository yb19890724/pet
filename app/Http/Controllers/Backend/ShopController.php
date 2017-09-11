<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\ShopService;

/* 店铺控制器 */
class ShopController extends BackendController
{
    private $shop;

    public function __construct(ShopService $Shop)
    {
        $this->shop=$Shop;
    }
}