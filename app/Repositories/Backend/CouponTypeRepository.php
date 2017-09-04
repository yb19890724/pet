<?php

namespace App\Repositories\Backend;

use App\Models\Backend\CouponTypeModel;
use App\Repositories\BaseRepository;

/* 卡券类型仓库层 */
class CouponTypeRepository extends BaseRepository
{

    public $bindModel = CouponTypeModel::class;//绑定模型

    public function test($params)
    {
        dd($this->model->couponTypes(['page'=>2]));
    }
}