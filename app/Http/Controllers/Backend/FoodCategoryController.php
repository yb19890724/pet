<?php

namespace App\Http\Controllers\Backend;

use App\Http\Responses\FoodCategoryIndexResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FoodCategoryService;

class FoodCategoryController extends Controller
{

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
    public function index(Request $request)
    {
        dd($data=$request->all());

        $params=$request->o(['aa']);
        dd($params);

        //
        $result=$this->foodCategory->getFoodCategoryList();
        return new FoodCategoryIndexResponse($result);
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
            return $this->response->withCreated(['message'=>'添加成功']);
        }
        return $this->response->withCreated($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result=$this->foodCategory->getFoodCategoryDetail($id);
        return $this->response->responseJson(['data'=>$result]);
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
            return $this->response->withNotContent();
        }
        return $this->response->withNotImplemented('修改失败');
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
            return $this->response->withGone('删除成功');
        }
        return $this->response->withNotImplemented('删除失败');
    }
}
