<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    protected $fillable=['box_number','sort'];

    protected $dates=['created_at', 'updated_at'];

    public function createTime()
    {
        return $this->created_at->toDateTimeString();
    }

    public function updateTime()
    {
        return $this->updated_at->toDateTimeString();
    }
}
