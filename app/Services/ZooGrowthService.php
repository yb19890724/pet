<?php

namespace App\Services;

use App\Repository\Contracts\ZooGrowthRepository;

class ZooGrowthService
{
    /**
     * @var ZooGrowthRepositoryEloquent
     */
    protected $zooGrowthRepository;

    public function __construct(ZooGrowthRepository $zooGrowthRepository)
    {
        $this->zooGrowthRepository = $zooGrowthRepository;
    }

   /**
    * Get ZooGrowths  and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getZooGrowths()
    {
        return $this->zooGrowthRepository->paginate();
    }

   /**
    * Get one ZooGrowth  by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getZooGrowth($id)
    {
        return $this->zooGrowthRepository->find($id);
    }

   /**
    * Create a new line on ZooGrowth.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storeZooGrowth($data)
    {
        return $this->zooGrowthRepository->create($data);
    }

   /**
    * Update ZooGrowth one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updateZooGrowth($id, $data)
    {
        return $this->zooGrowthRepository->update($id, $data);
    }

   /**
    * Delete ZooGrowth one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deleteZooGrowth($id)
    {
        return $this->zooGrowthRepository->deleteById($id);
    }

}