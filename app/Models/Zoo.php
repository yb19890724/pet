<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoo extends Model
{
    protected $fillable = [
        'name',
        'sex',
        'state',
        'descriptions',
        'color',
        'father_id',
        'mother_id',
        /*
        'boxes_id',
        'dominant_gene',
        'hide_gene',*/
        'sort',
        'birthday'
    ];

   /* public function ()
    {
        
    }*/
    
    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    public function colorTransform()
    {
        $color=config("dictionaries.color.{$this->color}");
        return $color ?? '';
    }

    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    public function sexTransform()
    {
        $color=config("dictionaries.sex.{$this->sex}");
        return $color ?? '';
    }

    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    public function stateTransform()
    {
        $color=config("dictionaries.state.{$this->state}");
        return $color ?? '';
    }
}
