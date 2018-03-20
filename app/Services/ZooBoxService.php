<?php

namespace App\Services;

use App\Repository\Contracts\ZooBoxRepository;

class ZooBoxService
{
    /**
     * @var ZooBoxRepositoryEloquent
     */
    protected $zooBoxRepository;

    public function __construct(ZooBoxRepository $zooBoxRepository)
    {
        $this->zooBoxRepository = $zooBoxRepository;
    }

    /**
     * Get ZooBoxes  and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getZooBoxes()
    {
        return $this->zooBoxRepository->paginate();
    }

    /**
     * Get zoo boxes all.
     *
     * @return mixed
     */
    public function getZooBoxesAll()
    {
        return $this->zooBoxRepository->getZooBoxesAll();
    }

    /**
     * Get one ZooBox  by primary key.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function getZooBox($id)
    {
        return $this->zooBoxRepository->find($id);
    }

    /**
     * Create a new line on ZooBox.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function storeZooBox($data)
    {
        return $this->zooBoxRepository->create($data);
    }

    /**
     * Update ZooBox one line by primary key.
     *
     * @param $id
     * @param array $data
     * @return int
     */
    public function updateZooBox($id, $data)
    {
        return $this->zooBoxRepository->update($id, $data);
    }

    /**
     * Delete ZooBox one line by primary key.
     *
     * @param $id
     * @return mixed
     */
    public function deleteZooBox($id)
    {
        return $this->zooBoxRepository->deleteById($id);
    }

}