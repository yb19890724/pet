<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\CustomerModel;
use Facades\App\Transformer\Backend\CustomerTransform as Customer;

/* 用户仓库层 */
class CustomerRepository extends BaseRepository
{
    public $bindModel = CustomerModel::class;//绑定模型

}