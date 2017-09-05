<?php

namespace App\Models\Backend;

use App\Models\BaseModel;

class CouponTypeModel extends BaseModel
{
    protected $primaryKey='id';
    protected $table="articles"; //表名
    protected $fillable = [         //入库字段
        'user_id','title','body','create_at','update_at'
    ];

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
     * @return:
     */
    public function couponTypeDestroy($params)
    {
        return $this->destroy($params);
    }

}
