<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class PetGrowth extends Model
{
    use DateTimeTrait;

    protected $fillable=[
        'id',
        'pet_id',
        'weight',
        'body_length',
        'created_at',
        'updated_at'
    ];


}
