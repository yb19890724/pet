<?php

namespace App\Http\Controllers\Backend;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ZooBoxService;
use App\Http\Responses\ZooBox\ZooBoxIndexResponse;
use App\Http\Responses\ZooBox\ZooBoxAllResponse;

class ZooBoxController extends Controller
{
    use ResponseTrait;

    private $zooBox;

    public function __construct(ZooBoxService $zooBoxService)
    {
        $this->zooBox=$zooBoxService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=$this->zooBox->getZooBoxes();
        return new ZooBoxIndexResponse($result);
    }

    /**
     * get zoo boexs all .
     *
     * @return ZooBoxIndexResponse
     */
    public function getZooBoxesAll()
    {
        $result=$this->zooBox->getZooBoxesAll();
        return new ZooBoxAllResponse($result);
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
        $result=$this->zooBox->storeZooBox($request->all());
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
        $result=$this->zooBox->getZooBox($id);
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
        $result = $this->zooBox->updateZooBox($id, $request->all());
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
        $result = $this->zooBox->deleteZooBox($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
