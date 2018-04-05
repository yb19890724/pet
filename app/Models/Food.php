<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class Food extends Model
{
    use DateTimeTrait;
    //
    protected $fillable=['food_category_id','name','sort'];

    protected $dates=['created_at', 'updated_at'];

    /**
     * set foods fields
     * @return mixed
     */
    public function scopeFoodsFields($query)
    {
        return $query->select(['id','name','sort','created_at']);
    }

    /**
     * set food select fields
     * @return mixed
     */
    public function scopeSelectFields($query)
    {
        return $query->select(['id','name']);
    }
}
