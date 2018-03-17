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


}
