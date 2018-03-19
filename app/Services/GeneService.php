<?php

namespace App\Services;

use App\Repository\Contracts\GeneRepository;

class GeneService
{
    /**
     * @var GeneRepositoryEloquent
     */
    protected $geneRepository;

    public function __construct(GeneRepository $geneRepository)
    {
        $this->geneRepository = $geneRepository;
    }

   /**
    * Get Gene list and paginate.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getGenes()
    {
        return $this->geneRepository->paginate();
    }

    /**
     * Get Gene all .
     *
     * @return mixed
     */
    public function getGeneAll()
    {
        return $this->geneRepository->getGeneAll();
    }
    
   /**
    * Get one Gene Detail by primary key.
    *
    * @param $id
    * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
    */
    public function getGene($id)
    {
        return $this->geneRepository->find($id);
    }

   /**
    * Create a new line on Gene.
    *
    * @param array $data
    * @return \Illuminate\Database\Eloquent\Model|$this
    */
    public function storeGene($data)
    {
        return $this->geneRepository->create($data);
    }

   /**
    * Update Gene one line by primary key.
    *
    * @param $id
    * @param array $data
    * @return int
    */
    public function updateGene($id, $data)
    {
        return $this->geneRepository->update($id, $data);
    }

   /**
    * Delete Gene one line by primary key.
    *
    * @param $id
    * @return mixed
    */
    public function deleteGene($id)
    {
        return $this->geneRepository->deleteById($id);
    }

}