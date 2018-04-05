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

    protected $dates = ['created_at', 'updated_at'];

    /**
     * set pet growth fields
     * @return mixed
     */
    public function scopePetGrowthFields($query)
    {
        return $query->select([
            'id',
            'weight',
            'body_length',
            'created_at'
        ]);
    }
}
