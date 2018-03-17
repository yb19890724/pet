<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class ZooBoxes extends Model
{
    use DateTimeTrait;

    protected $fillable=['box_number','sort'];

    protected $dates=['created_at', 'updated_at'];


}
