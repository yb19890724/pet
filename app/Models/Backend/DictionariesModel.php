<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 字典模型 */

class DictionariesModel extends BaseModel
{
    protected $primaryKey = 'id';
    protected $table = 'dictionary'; //表名
    protected $fillable = [
        'id',
        'parent_id',
        'code',
        'name',
        'remark',
        'version',
        'sort',
        'status',
        'create_user_id',
        'update_user_id',
        'created_at',
        'updated_at',
    ];//入库字段

    //匹配查询条件
    public function scopeApplyConditions($query, array $where)
    {
        if (isset($where['id'])) { //根据父类筛选
            $query->where('id', '=', $where['id']);
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
    public function scopeFields($query,string $methods="")
    {
        $methods = !empty($methods)?$methods:get_current_action()['method'];
        if ($methods == "dictionaries") {
            $query->select(['id','name']);
        }
        if ($methods == "dictionaryTree") {//生成字典数据
            $query->select(['id','parent_id','code','name']);
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
    public function dictionaries(array $params,$fields)
    {
        return $this->paginates($params,$fields);
    }

    /**
     * @desc:   字典所有数据
     * @auth:   hyb
     * @date:   2017/9/14
     * @time:   13:17
     * @param:  $fields 指定查询字段
     * @return: collection
     */
    public function dictionariesAll(string $fields)
    {
        return $this->fields($fields)->orderby('id','asc')->orderby('parent_id','asc')->get();
    }

}
