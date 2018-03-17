<?php

namespace App\Traits;

trait DateTimeTrait{

    //create time transform
    public function createTime()
    {
        return $this->created_at->toDateTimeString();
    }

    //update time transform
    public function updateTime()
    {
        return $this->updated_at->toDateTimeString();
    }
}