<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\CouponTypeModel;

/* 卡券类型仓库层 */
class CouponTypeRepository extends BaseRepository
{
    public $bindModel = CouponTypeModel::class;//绑定模型

    public function test()
    {
        dd($this->model->paginate(10));
    }
}