<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\AreaModel;
use Facades\App\Transformer\Backend\AreaTransform as CouponType;

/* 地区仓库层 */
class AreaRepository extends BaseRepository
{
    public $bindModel = AreaModel::class;//绑定模型

}