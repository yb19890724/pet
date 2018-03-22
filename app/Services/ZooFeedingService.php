<?php

namespace App\Services;

use App\Repository\Contracts\ZooFeedingRepository;

class ZooFeedingService
{
    /**
     * @var ZooFeedingRepositoryEloquent
     */
    protected $zooFeedingRepository;

    public function __construct(ZooFeedingRepository $zooFeedingRepository)
    {
        $this->zooFeedingRepository = $zooFeedingRepository;
    }

   /**
    * Get ZooFeedings  and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getZooFeedings(int $zooId,int $perPage = 0)
    {
        request()->merge(['zoo_id'=>$zooId]);
        return $this->zooFeedingRepository->getZooFeedings($perPage);
    }

   /**
    * Get one ZooFeeding  by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getZooFeeding($id)
    {
        return $this->zooFeedingRepository->find($id);
    }

   /**
    * Create a new line on ZooFeeding.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storeZooFeeding($data)
    {
        return $this->zooFeedingRepository->create($data);
    }

   /**
    * Update ZooFeeding one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updateZooFeeding($id, $data)
    {
        return $this->zooFeedingRepository->update($id, $data);
    }

   /**
    * Delete ZooFeeding one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deleteZooFeeding($id)
    {
        return $this->zooFeedingRepository->deleteById($id);
    }

}