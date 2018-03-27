<?php

namespace App\Services;

use App\Repository\Contracts\FoodRepository;

class FoodService
{
    /**
     * @var FoodRepositoryEloquent
     */
    protected $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    /**
     * Get Food list and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFoodList()
    {
        return $this->foodRepository->paginate();
    }


    /**
     * Get Search Food list and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchFoods(int $perPage = 0)
    {
        return $this->foodRepository->searchFoods($perPage);
    }

    /**
     * Get Search Food list and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFoodsAll()
    {
        return $this->foodRepository->getFoodsAll();
    }


    /**
     * Get one Food Detail by primary key.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function getFood($id)
    {
        return $this->foodRepository->find($id);
    }

    /**
     * Create a new line on Food.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function storeFood($data)
    {
        return $this->foodRepository->create($data);
    }

    /**
     * Update Food one line by primary key.
     *
     * @param $id
     * @param array $data
     * @return int
     */
    public function updateFood($id, $data)
    {
        return $this->foodRepository->update($id, $data);
    }

    /**
     * Delete Food one line by primary key.
     *
     * @param $id
     * @return mixed
     */
    public function deleteFood($id)
    {
        return $this->foodRepository->deleteById($id);
    }

}