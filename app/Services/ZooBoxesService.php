<?php

namespace App\Services;

use App\Repository\Contracts\ZooBoxesRepository;

class ZooBoxesService
{
    /**
     * @var ZooBoxesRepositoryEloquent
     */
    protected $zooBoxesRepository;

    public function __construct(ZooBoxesRepository $zooBoxesRepository)
    {
        $this->zooBoxesRepository = $zooBoxesRepository;
    }

   /**
    * Get ZooBoxes list and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getZooBoxesList()
    {
        return $this->zooBoxesRepository->paginate();
    }

   /**
    * Get one ZooBoxes Detail by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getZooBoxesDetail($id)
    {
        return $this->zooBoxesRepository->find($id);
    }

   /**
    * Create a new line on ZooBoxes.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storeZooBoxes($data)
    {
        return $this->zooBoxesRepository->create($data);
    }

   /**
    * Update ZooBoxes one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updateZooBoxes($id, $data)
    {
        return $this->zooBoxesRepository->update($id, $data);
    }

   /**
    * Delete ZooBoxes one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deleteZooBoxes($id)
    {
        return $this->zooBoxesRepository->deleteById($id);
    }

}