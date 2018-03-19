<?php

namespace App\Http\Controllers\Backend;

use App\Http\Responses\FoodCategory\FoodCategoryIndexResponse;
use App\Http\Responses\FoodCategory\FoodCategoryAllResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FoodCategoryService;
use App\Traits\ResponseTrait;

class FoodCategoryController extends Controller
{
    use ResponseTrait;
    private $foodCategory;

    public function __construct(FoodCategoryService $foodCategoryService)
    {
        $this->foodCategory=$foodCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=$this->foodCategory->searchFoodCategories();
        return new FoodCategoryIndexResponse($result);
    }

    /**
     * get foodCategory select data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFoodCategoryAll()
    {
        $result=$this->foodCategory->getFoodCategoryAll();
        return new FoodCategoryAllResponse($result);
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
        $result=$this->foodCategory->storeFoodCategory($request->all());
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
        $result=$this->foodCategory->getFoodCategory($id);
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
        $result = $this->foodCategory->updateFoodCategory($id, $request->all());
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
        $result = $this->foodCategory->deleteFoodCategory($id);
        if (!empty($result)) {
            return $this->withGone(trans('message.delete.success'));
        }
        return $this->withNotImplemented(trans('message.delete.error'));
    }
}
