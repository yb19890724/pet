<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\DictionaryModel;
use Facades\App\Transformer\Backend\DictionaryTransform as CouponType;

/* 字典仓库层 */
class DictionaryRepository extends BaseRepository
{
    public $bindModel = DictionaryModel::class;//绑定模型

}