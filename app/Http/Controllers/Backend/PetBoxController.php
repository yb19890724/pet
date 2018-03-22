<?php

namespace App\Http\Controllers\Backend;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PetBoxService;
use App\Http\Responses\PetBox\PetBoxIndexResponse;
use App\Http\Responses\PetBox\PetBoxAllResponse;

class PetBoxController extends Controller
{
    use ResponseTrait;

    private $petBox;

    public function __construct(PetBoxService $petBoxService)
    {
        $this->petBox=$petBoxService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=$this->petBox->getPetBoxes();
        return new PetBoxIndexResponse($result);
    }

    /**
     * get pet boexs all .
     *
     * @return PetBoxIndexResponse
     */
    public function getPetBoxesAll()
    {
        $result=$this->petBox->getPetBoxesAll();
        return new PetBoxAllResponse($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result=$this->petBox->storePetBox($request->all());
        if(!empty($result)){
            return $this->withCreated(['message'=>trans('message.create.success')]);
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
        $result=$this->petBox->getPetBox($id);
        return $this->responseJson($result);
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
        $result = $this->petBox->updatePetBox($id, $request->all());
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
        $result = $this->petBox->deletePetBox($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
