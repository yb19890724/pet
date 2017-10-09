<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 配送中心模型 */
class CenterModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table='center'; //表名
    protected $fillable = [];//入库字段


    /**
     * @desc:   查询字段
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   10:04
     * @param:
     * @return:
     */
    public function scopeFields($query,string $methods="")
    {

        return $query;
    }

    /**
     * @desc:   配送中心列表
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   13:17
     * @param:  $fields 指定查询字段
     * @return: collection
     */
    public function centers(array $params,string $fields)
    {
        return $this->paginates($params,$fields);
    }


}
