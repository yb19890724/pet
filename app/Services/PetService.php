<?php

namespace App\Services;

use App\Repository\Contracts\PetRepository;

class PetService
{
    /**
     * @var PetRepositoryEloquent
     */
    protected $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }


    /**
     * get pet all.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPetAll()
    {
        return $this->petRepository->getPetAll();
    }
    
   /**
    * Get Pet list and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getPetList()
    {
        return $this->petRepository->paginate();
    }

    /**
     * Get Search pet list and paginate.
     *
     * @param int $perPage
     * @return mixed
     */
    public function searchPets(int $perPage = 0)
    {
        return $this->petRepository->searchPets($perPage);
    }

   /**
    * Get one Pet Detail by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getPet($id)
    {
        return $this->petRepository->find($id);
    }

   /**
    * Create a new line on Pet.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storePet($data)
    {
        return $this->petRepository->create($data);
    }

   /**
    * Update Pet one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updatePet($id, $data)
    {
        return $this->petRepository->update($id, $data);
    }

   /**
    * Delete Pet one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deletePet($id)
    {
        return $this->petRepository->deleteById($id);
    }

}