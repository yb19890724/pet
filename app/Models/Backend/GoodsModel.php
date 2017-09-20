<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 商品模型 */
class GoodsModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table='goods'; //表名
    protected $fillable = [];//入库字段

    /**
     * @desc:   商品列表
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   15:09
     * @param:
     * @return: collect
     */
    public function goods(array $params)
    {
        return $this->paginates($params);
    }


}
