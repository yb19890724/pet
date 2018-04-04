<?php

namespace App\Http\Controllers\Backend;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GeneService;
use App\Http\Responses\Gene\{
    IndexResponse,AllResponse
};
use App\Http\Requests\Gene\{
    StoreRequest,UpdateRequest
};

class GeneController extends Controller
{
    use ResponseTrait;
    protected $gene;

    public function __construct(GeneService $geneService)
    {
        $this->gene = $geneService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->gene->getGenes();
        return new IndexResponse($result);
    }

    /**
     * get gene all
     *
     */
    public function getGentAll()
    {
        $result = $this->gene->getGeneAll();
        return new AllResponse($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $result = $this->gene->storeGene($request->all());
        if (!empty($result)) {
            return $this->withCreated(['message' => trans('message.create.success')]);
        }
        return $this->withCreated($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->gene->getGene($id);
        return $this->responseJson($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $result = $this->gene->updateGene($id, $request->all());
        if (!empty($result)) {
            return $this->withNotContent();
        }
        return $this->withNotImplemented(trans('message.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->gene->deleteGene($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
