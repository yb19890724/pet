<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class PetBox extends Model
{
    use DateTimeTrait;

    protected $fillable = ['box_number', 'sort'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * set pet box fields
     * @param int $perPage
     * @return mixed
     */
    public function petBoxAll($query)
    {
        return $query->select(['id','box_number'])->get();
    }
}
