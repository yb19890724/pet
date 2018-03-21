<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class ZooFeeding extends Model
{
    use DateTimeTrait;

    protected $fillable=[
        'zoo_id',
        'food_id',
        'food_category_id',
        'zoo_boxes_id',
        'unit',
        'descriptions'
    ];



}
