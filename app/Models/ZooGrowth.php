<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class ZooGrowth extends Model
{
    use DateTimeTrait;

    protected $fillable=[
        'id',
        'zoo_id',
        'weight',
        'body_length',
        'created_at',
        'updated_at'
    ];


}
