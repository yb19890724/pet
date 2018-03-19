<?php

namespace App\Http\Controllers\Backend;

use App\Http\Responses\Zoo\ZooShowResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ZooService;
use App\Http\Responses\Zoo\ZooIndexResponse;
use App\Http\Responses\Zoo\ZooAllResponse;
use App\Traits\ResponseTrait;


class ZooController extends Controller
{
    use ResponseTrait;

    private $zoo;

    public function __construct(ZooService $zooService)
    {
        $this->zoo = $zooService;
    }

    /**
     * get zoo all .
     *
     * @return \Illuminate\Http\Response
     */
    public function getZooAll()
    {
        $result = $this->zoo->getZooAll();
        return new ZooAllResponse($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->zoo->searchZoos();
        return new ZooIndexResponse($result);
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
        $result = $this->zoo->storeZoo($request->all());
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
        $result = $this->zoo->getZoo($id);
        return new ZooShowResponse($result);
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
        $result = $this->zoo->updateZoo($id, $request->all());
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
        $result = $this->zoo->deleteZoo($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
