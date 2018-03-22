<?php

namespace App\Services;

use App\Repository\Contracts\PetBoxRepository;

class PetBoxService
{
    /**
     * @var PetBoxRepositoryEloquent
     */
    protected $petBoxRepository;

    public function __construct(PetBoxRepository $petBoxRepository)
    {
        $this->petBoxRepository = $petBoxRepository;
    }

    /**
     * Get PetBoxes  and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPetBoxes()
    {
        return $this->petBoxRepository->paginate();
    }

    /**
     * Get pet boxes all.
     *
     * @return mixed
     */
    public function getPetBoxesAll()
    {
        return $this->petBoxRepository->getPetBoxesAll();
    }

    /**
     * Get one PetBox  by primary key.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function getPetBox($id)
    {
        return $this->petBoxRepository->find($id);
    }

    /**
     * Create a new line on PetBox.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function storePetBox($data)
    {
        return $this->petBoxRepository->create($data);
    }

    /**
     * Update PetBox one line by primary key.
     *
     * @param $id
     * @param array $data
     * @return int
     */
    public function updatePetBox($id, $data)
    {
        return $this->petBoxRepository->update($id, $data);
    }

    /**
     * Delete PetBox one line by primary key.
     *
     * @param $id
     * @return mixed
     */
    public function deletePetBox($id)
    {
        return $this->petBoxRepository->deleteById($id);
    }

}