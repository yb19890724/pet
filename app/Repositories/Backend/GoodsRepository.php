<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\GoodsModel;
use Facades\App\Transformer\Backend\GoodsTransform as Goods;

/* 商品仓库层 */
class GoodsRepository extends BaseRepository
{
    public $bindModel = GoodsModel::class;//绑定模型

}