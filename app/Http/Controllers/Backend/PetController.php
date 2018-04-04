<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PetService;
use App\Http\Responses\Pet\{
    IndexResponse,AllResponse,ShowResponse
};
use App\Http\Requests\Pet\{
    StoreRequest,UpdateRequest
};
use App\Traits\ResponseTrait;

class PetController extends Controller
{
    use ResponseTrait;

    private $pet;

    public function __construct(PetService $petService)
    {
        $this->pet = $petService;
    }

    /**
     * get pet all .
     *
     * @return \Illuminate\Http\Response
     */
    public function getPetAll()
    {
        $result = $this->pet->getPetAll();
        return new AllResponse($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->pet->searchPets();
        return new IndexResponse($result);
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
    public function store(Request $request)
    {
        $result = $this->pet->storePet($request->all());
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
        $result = $this->pet->getPet($id);
        return new ShowResponse($result);
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
    public function update(Request $request, $id)
    {
        $result = $this->pet->updatePet($id, $request->all());
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
        $result = $this->pet->deletePet($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
