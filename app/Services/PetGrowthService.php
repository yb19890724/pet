<?php

namespace App\Services;

use App\Repository\Contracts\PetGrowthRepository;
use Illuminate\Http\Request;

class PetGrowthService
{
    /**
     * @var PetGrowthRepositoryEloquent
     */
    protected $petGrowthRepository;

    public function __construct(PetGrowthRepository $petGrowthRepository)
    {
        $this->petGrowthRepository = $petGrowthRepository;
    }

   /**
    * Get PetGrowths  and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getPetGrowths(int $perPage = 0)
    {
        return $this->petGrowthRepository->getPetGrowths($perPage);
    }

   /**
    * Get one PetGrowth  by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getPetGrowth($id)
    {
        return $this->petGrowthRepository->find($id);
    }

   /**
    * Create a new line on PetGrowth.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storePetGrowth($data)
    {
        return $this->petGrowthRepository->create($data);
    }

   /**
    * Update PetGrowth one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updatePetGrowth($id, $data)
    {
        return $this->petGrowthRepository->update($id, $data);
    }

   /**
    * Delete PetGrowth one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deletePetGrowth($id)
    {
        return $this->petGrowthRepository->deleteById($id);
    }

}