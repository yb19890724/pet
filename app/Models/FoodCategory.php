<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class FoodCategory extends Model
{
    use DateTimeTrait;
    //
    protected $fillable=['name','sort'];

    protected $dates=['created_at', 'updated_at'];

    /**
     * set food categories fields
     * @return mixed
     */
    public function scopeFoodCategoriesFields($query)
    {
        return $query->select(['id','name','sort','created_at']);
    }

    /**
     * set food categories select fields
     * @return mixed
     */
    public function scopeSelectFields($query)
    {
        return $query->select(['id','name']);
    }
}
