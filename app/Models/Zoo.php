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
        'dominant_gene',
        'sort',
        'birthday'
    ];

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

    /**
     * set  gene_type value
     * @return  string
     */
    public function setDominantGeneAttribute()
    {
        //$this->attributes['dominant_gene']=explode(',',$this->attributes['dominant_gene']);
    }
}
