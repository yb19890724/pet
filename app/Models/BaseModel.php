<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* 基础模型 */

abstract class BaseModel extends Model
{

    //条件拼接抽象方法
    public abstract function scopeApplyConditions($query, array $where);

    /**
     * @desc:   分页公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   16:53
     * @param:  $params
     * @return: object
     */
    public function scopePaginates($query, array $params)
    {
        $model = clone $query;
        $limit = existence($params, 'size') ? $params['size'] : $this->perPage;
        $params['page'] = isset($params['page']) ? $params['page'] - 1 : 0;
        $offset = $params['page'] * $limit < 0 ? 0 : $params['page'] * $limit;
        $total = $model->selectRaw('count(*) as total')->first();
        $data = $query->offset($offset)->limit($limit)->get();
        return compact('total', 'data');
    }

    /**
     * @desc:   添加公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   17:51
     * @param:
     * @return: 返回添加id
     */
    public function insertGetId(array $attributes)
    {
        return parent::insertGetId(array_only($attributes, $this->fillable));
    }

    /**
     * @desc:   删除公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:02
     * @param:
     * @return:
     */
    public function conditionsDelete(array $where)
    {
        return $this->applyConditions($where)->delete();
    }

    /**
     * @desc:   修改公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:03
     * @param:
     * @return:
     */
    public function conditionsUpdate($where, $attributes)
    {
        return $this->applyConditions($where)->update($attributes);
    }
}
