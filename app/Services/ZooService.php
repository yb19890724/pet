<?php

namespace App\Services;

use App\Repository\Contracts\ZooRepository;

class ZooService
{
    /**
     * @var ZooRepositoryEloquent
     */
    protected $zooRepository;

    public function __construct(ZooRepository $zooRepository)
    {
        $this->zooRepository = $zooRepository;
    }


    /**
     * get zoo all.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getZooAll()
    {
        return $this->zooRepository->getZooAll();
    }
    
   /**
    * Get Zoo list and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getZooList()
    {
        return $this->zooRepository->paginate();
    }

    /**
     * Get Search zoo list and paginate.
     *
     * @param int $perPage
     * @return mixed
     */
    public function getSearchZooList(int $perPage = 0)
    {
        return $this->zooRepository->getSearchZooList($perPage);
    }

   /**
    * Get one Zoo Detail by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getZooDetail($id)
    {
        return $this->zooRepository->find($id);
    }

   /**
    * Create a new line on Zoo.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storeZoo($data)
    {
        return $this->zooRepository->create($data);
    }

   /**
    * Update Zoo one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updateZoo($id, $data)
    {
        return $this->zooRepository->update($id, $data);
    }

   /**
    * Delete Zoo one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deleteZoo($id)
    {
        return $this->zooRepository->deleteById($id);
    }

}