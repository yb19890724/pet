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

}
