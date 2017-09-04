<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

class CouponTypeModel extends BaseModel
{

    protected $table="users"; //表名
    protected $primaryKey="id";     //表主键
    protected $fillable = [         //入库字段

    ];

    public function scopeApplyConditions($query,array $where)
    {
       /* if(existence($where,'id')){
            $query->where('id','=',$where['id']);
        }*/
        return $query;
    }

    /**
     * @desc:   卡券列表
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   16:42
     * @param:
     * @return:
     */
    public function couponTypes(array $params)
    {
        $result=$this->applyConditions($params)->paginates($params);
        return $result;
    }
}
