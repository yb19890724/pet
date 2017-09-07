<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

/* 卡券类型模型 */
class CouponTypeModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table="card_coupon_type"; //表名
    protected $fillable = [         //入库字段
        'shop_id',
        'name',
        'logo',
        'buy_price',
        'price',
        'discount',
        'coupon_code',
        'limit_number',
        'number',
        'begin_date',
        'expiration_date',
        'publish',
        'use_date',
        'description'
    ];

    //匹配查询条件
    public function scopeApplyConditions($query,array $where)
    {
        if(existence($where,'id')){
            $query->where('id','=',$where['id']);
        }
        return $query;
    }

    /**
     * @desc:   卡券列表
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   16:42
     * @param:
     * @return: collection
     */
    public function couponTypes(array $params)
    {
        return $this->applyConditions($params)->paginates($params);
    }

    /**
     * @desc:   删除卡券
     * @auth:   hyb
     * @date:   2017/9/5
     * @time:   17:35
     * @param:
     * @return: bool
     */
    public function couponTypeDestroy(array $params)
    {
        return $this->destroy($params);
    }

}
