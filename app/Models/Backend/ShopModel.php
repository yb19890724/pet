<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 店铺模型 */
class ShopModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table='shop'; //表名
    protected $fillable = [];//入库字段

    /**
     * @desc:   店铺列表
     * @auth:   hyb
     * @date:   2017/9/20
     * @time:   15:09
     * @param:
     * @return: collect
     */
    public function shops(array $params)
    {
        return $this->paginates($params);
    }


}
