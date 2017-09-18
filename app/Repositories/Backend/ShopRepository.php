<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\ShopModel;
use Facades\App\Transformer\Backend\ShopTransform as Shop;

/* 店铺仓库层 */
class ShopRepository extends BaseRepository
{
    public $bindModel = ShopModel::class;//绑定模型

}