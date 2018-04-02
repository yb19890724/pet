<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\PetGrowth\IndexResponse;
use App\Http\Responses\PetGrowth\ShowResponse;
use App\Services\PetGrowthService;
use App\Traits\ResponseTrait;

class PetGrowthController extends Controller
{
    use ResponseTrait;

    protected $petGrowth;

    public function __construct(PetGrowthService $petGrowthService)
    {
        $this->petGrowth=$petGrowthService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPetGrowths(int $petId)
    {
        $result = $this->petGrowth->getPetGrowths();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->petGrowth->storePetGrowth($request->all());
        if (!empty($result)) {
            return $this->withCreated(['message' => trans('message.create.success')]);
        }
        return $this->withCreated($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  $this->petGrowth->getPetGrowth($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->petGrowth->updatePetGrowth($id, $request->all());
        if (!empty($result)) {
            return $this->withNotContent();
        }
        return $this->withNotImplemented(trans('message.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->petGrowth->deletePetGrowth($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
