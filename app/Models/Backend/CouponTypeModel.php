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
        'limit_number',
        'coupon_number',
        'expiration_date',
        'publish',
        'use_date',
        'description'
    ];

    /**
     * @desc:   卡券列表
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   16:42
     * @param:
     * @return: collect
     */
    public function couponTypes(array $params)
    {
        return $this->applyConditions($params)->paginates($params);
    }


}
