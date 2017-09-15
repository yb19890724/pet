<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* 基础模型 */

abstract class BaseModel extends Model
{
    private $pageNow;//当前页
    private $pageSize;//返回记录数

    //条件拼接抽象方法
    public abstract function scopeApplyConditions($query, array $where);

    //查询字段抽象方法
    public abstract function scopeFields($query);

    /**
     * @desc:   分页公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   16:53
     * @param:  $params
     * @return: object
     */
    public function scopePaginates($query, array $params, string $fields)
    {
        $model = clone $query;
        $this->pageSize($params)->pageNow($params);
        $total = $model->selectRaw("count(`{$this->table}`.`{$this->primaryKey}`) as total")->first()['total'];//总记录数
        $data = $query->applyConditions($params)->fields($fields)->offset($this->pageNow)->limit($this->pageSize)->get();//查询
        return !empty($total) && !empty($data) ? collect(compact('total', 'data')) : [];
    }

    //计算返回记录数
    protected function pageSize(array $params)
    {
        $this->pageSize = existence($params, 'size') ? $params['size'] : $this->perPage;//返回记录数
        return $this;
    }

    //计算当前前页码
    protected function pageNow(array $params)
    {
        $page = isset($params['page']) ? $params['page'] - 1 : 0;
        $this->pageNow = $page * $this->pageSize < 0 ? 0 : $page * $this->pageSize;//当前页码
    }

    /**
     * @desc:   添加公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   17:51
     * @param:  $attributes 添加属性
     * @return: 返回添加id
     */
    public function create(array $attributes)
    {
        return parent::create($this->fill($attributes)->toArray());
    }

    /**
     * @desc:   获取所有数据
     * @auth:   hyb
     * @date:   2017/9/15
     * @time:   11:54
     * @param:  $where  条件数组
     * @param:  $fields 查询字段
     * @return:
     */
    public function fetchALL(string $fields, array $where=[])
    {
        return $this->fields($fields)->applyConditions($where)->get();
    }

    /**
     * @desc:   删除公用方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   18:02
     * @param:  $where 删除条件
     * @return: boolean
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
