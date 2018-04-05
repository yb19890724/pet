<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'pet_box_id',
        'sex',
        'state',
        'descriptions',
        'color',
        'father_id',
        'mother_id',
        'dominant_gene',
        'recessive_gene',
        'sort',
        'birthday'
    ];


    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    public function sexTransform()
    {
        $color = config("dictionaries.sex.{$this->sex}");
        return $color ?? '';
    }

    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    public function statusTransform()
    {
        $color = config("dictionaries.state.{$this->status}");
        return $color ?? '';
    }

    /**
     * set dominant gene value
     * @return  string
     */
    public function setDominantGeneAttribute($value)
    {
        if (not_empty_array($value)) {
            $this->attributes['dominant_gene'] = implode(',', $value);
        }
    }

    /**
     * set hide gene value
     * @return  string
     */
    public function setRecessiveGeneAttribute($value)
    {
        if (not_empty_array($value)) {
            $this->attributes['recessive_gene'] = implode(',', $value);
        }
    }

    /**
     * get dominant gene value
     * @return  array
     */
    public function getDominantGeneAttribute($value)
    {
        if (!empty($value)) {
            return explode(',', $value);
        }
        return [];
    }

    /**
     * get dominant gene value
     * @return  array
     */
    public function getRecessiveGeneAttribute($value)
    {
        if (!empty($value)) {
            return explode(',', $value);
        }
        return [];
    }

    /**
     * set pet categories fields
     * @return mixed
     */
    public function scopePetFields($query)
    {
        return $query->select(['id','name','sex','status','color']);
    }

    /**
     * set pet select fields
     * @return mixed
     */
    public function scopeSelectFields($query)
    {
        return $query->select(['id','name']);
    }
}
