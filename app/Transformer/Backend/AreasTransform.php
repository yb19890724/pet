<?php

namespace App\Transformer\Backend;

use App\Transformer\Transform;

/* 地区映射类 */

class AreasTransform extends Transform
{
    protected $where = [];//参数条件

    protected $attributes = [];//属性

    /**
     * @desc:   地区树形数据
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:16
     * @param:  $treeData
     * @return: array
     */
    public function areaTrees(array $treeData)
    {
        if(!empty($treeData)){
            return generateTree($treeData);
        }
        return [];
    }
}