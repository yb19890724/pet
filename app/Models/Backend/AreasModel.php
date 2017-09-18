<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 地区模型 */
class AreasModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table='area'; //表名
    protected $fillable = [];//入库字段

    public function scopeFields($query)
    {
        return $query;
    }

    /**
     * @desc:   地区所有数据
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   13:17
     * @param:  $fields 指定查询字段
     * @return: collection
     */
    public function areasAll(string $fields)
    {
        return $this->fields($fields)->orderby('parent_id','asc')->get();
    }

}
