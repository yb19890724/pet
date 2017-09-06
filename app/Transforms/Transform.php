<?php

namespace App\Transforms;

/* 映射基础类 */
class Transform
{
    protected $where=[];//参数条件

    protected $attributes=[];//属性

    /**
     * @desc:   获取参数和条件
     * @auth:   hyb
     * @date:   2017/9/6
     * @time:   17:58
     * @param:  $params      参数
     * @param:  $where       条件字段
     * @param:  $attributes  属性字段
     * @return: array
     */
    protected function parameterCondition(array $params,array $where,array $attributes)
    {
        return [
            'where'=>$this->matchWhere($params,$where),
            'attributes'=>$this->matchAttributes($params,$attributes)
        ];
    }


    /**
     * @desc:   匹配where条件
     * @auth:   hyb
     * @date:   2017/9/6
     * @time:   17:32
     * @param:  $params      参数
     * @param:  $where       条件字段
     * @return: array
     */
    protected function matchWhere(array $params,array $where=[]){
        return array_only($params,$this->whereFields($where));
    }

    /**
     * @desc:   匹配修改属性
     * @auth:   hyb
     * @date:   2017/9/6
     * @time:   17:53
     * @param:  $params      参数
     * @param:  $attributes  属性字段
     * @return: array
     */
    protected function matchAttributes(array $params,array $attributes=[])
    {
        return array_only($params,$this->attributesFields($attributes));
    }

    //获取where条件字段
    private function whereFields($where)
    {
        return !empty($where)?$where:$this->where;
    }

    //获取属性字段
    private function attributesFields($attributes)
    {
        return !empty($attributes)?$attributes:$this->attributes;
    }
}