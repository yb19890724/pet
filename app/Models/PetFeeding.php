<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class PetFeeding extends Model
{
    use DateTimeTrait;

    protected $fillable=[
        'pet_id',
        'food_id',
        'food_category_id',
        'pet_box_id',
        'unit',
        'descriptions'
    ];



}
