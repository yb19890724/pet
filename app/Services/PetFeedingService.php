<?php

namespace App\Services;

use App\Repository\Contracts\PetFeedingRepository;

class PetFeedingService
{
    /**
     * @var PetFeedingRepositoryEloquent
     */
    protected $petFeedingRepository;

    public function __construct(PetFeedingRepository $petFeedingRepository)
    {
        $this->petFeedingRepository = $petFeedingRepository;
    }

   /**
    * Get PetFeedings  and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getPetFeedings(int $petId,int $perPage = 0)
    {
        request()->merge(['pet_id'=>$petId]);
        return $this->petFeedingRepository->getPetFeedings($perPage);
    }

   /**
    * Get one PetFeeding  by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getPetFeeding($id)
    {
        return $this->petFeedingRepository->find($id);
    }

   /**
    * Create a new line on PetFeeding.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storePetFeeding($data)
    {
        return $this->petFeedingRepository->create($data);
    }

   /**
    * Update PetFeeding one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updatePetFeeding($id, $data)
    {
        return $this->petFeedingRepository->update($id, $data);
    }

   /**
    * Delete PetFeeding one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deletePetFeeding($id)
    {
        return $this->petFeedingRepository->deleteById($id);
    }

}