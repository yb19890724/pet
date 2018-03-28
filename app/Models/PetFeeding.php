<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeTrait;

class PetFeeding extends Model
{
    use DateTimeTrait;

    protected $fillable = [
        'pet_id',
        'food_id',
        'food_category_id',
        'unit',
        'number',
        'descriptions'
    ];

    protected $casts = [
        'unit' => 'string',
    ];

    /**
     * feeding record pet has one relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function feedingHasPet()
    {
        return $this->hasOne(Pet::class, 'id', 'pet_id');
    }


    /**
     * feeding record food has one relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function feedingHasFood()
    {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }

    /**
     * feeding record food category has one relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function feedingHasFoodCategory()
    {
        return $this->hasOne(FoodCategory::class, 'id', 'food_category_id');
    }

    /**
     * get  feedings has one pet data
     *
     * @return $this
     */
    public function feedingPet()
    {
        return $this->feedingHasPet()->select(['id', 'name']);
    }

    /**
     * get  feeding has one food data
     *
     * @return $this
     */
    public function feedingFood()
    {
        return $this->feedingHasFood()->select(['id', 'name']);
    }

    /**
     * get  feeding has one food category data
     *
     * @return $this
     */
    public function feedingFoodCategory()
    {
        return $this->feedingHasFoodCategory()->select(['id', 'name']);
    }
}
