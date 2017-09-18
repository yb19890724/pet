<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\AreasModel;
use Facades\App\Transformer\Backend\AreasTransform as Area;

/* 地区仓库层 */
class AreasRepository extends BaseRepository
{
    public $bindModel = AreasModel::class;//绑定模型

    /**
     * @desc:   地区树形数据
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @return: array
     */
    public function areaTrees()
    {
        return Area::areaTrees($this->model->fetchALL());
    }
}