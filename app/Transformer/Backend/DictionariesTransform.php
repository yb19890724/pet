<?php

namespace App\Transformer\Backend;

use App\Transformer\Transform;

/* 字典映射类 */

class DictionariesTransform extends Transform
{
    protected $where = ['id'];//参数条件

    protected $attributes = ['name'];//属性


}