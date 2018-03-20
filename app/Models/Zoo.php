<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoo extends Model
{
    protected $fillable = [
        'name',
        'box_id',
        'sex',
        'state',
        'descriptions',
        'color',
        'father_id',
        'mother_id',
        'dominant_gene',
        'hide_gene',
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
    public function stateTransform()
    {
        $color = config("dictionaries.state.{$this->state}");
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
    public function setHideGeneAttribute($value)
    {
        if (not_empty_array($value)) {
            $this->attributes['hide_gene'] = implode(',', $value);
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
    public function getHideGeneAttribute($value)
    {
        if (!empty($value)) {
            return explode(',', $value);
        }
        return [];
    }
}
