<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 字典模型 */
class DictionariesModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table='dictionary'; //表名
    protected $fillable = [];//入库字段

    //匹配查询条件
    public function scopeApplyConditions($query,array $where)
    {
        if(isset($where['id'])){ //根据父类筛选
            $query->where('parent_id','=',$where['id']);
        }
        return $query;
    }

    /**
     * @desc:   查询字段
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   10:04
     * @param:
     * @return:
     */
    public function scopeFields($query)
    {
        $methods=get_current_action()['method'];
        if($methods=="dictionaries"){
            $query->select(['name']);
        }
        return $query;
    }

    /**
     * @desc:   字典列表
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   16:42
     * @param:
     * @return: collection
     */
    public function dictionaries(array $params)
    {
        return $this->applyConditions($params)->paginates($params);
    }


}
