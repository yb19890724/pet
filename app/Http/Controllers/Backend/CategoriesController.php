<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\CategoriesService;

/* 商品分类控制器 */
class CategoriesController extends BackendController
{
    private $categories;

    public function __construct(CategoriesService $Categories)
    {
        $this->categories=$Categories;
    }


    public function categories(int $page, int $size)
    {
        $result = $this->categories->categories(compact('page', 'size'));
        if (existence($result, 'data')) {
            return $this->successResponse($result);
        }
        return $this->errorResponse();
    }


    public function categoriesCreate(Request $request)
    {
        $result = $this->categories->categoriesCreate($request->all());
        if (!empty($result)) {
            return $this->successResponse([], trans('global.create.success'));
        }
        return $this->errorResponse( trans('global.create.fail'));
    }


    public function categoriesDestroy(int $id)
    {
        $result=$this->categories->categoriesDestroy(compact('id'));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.delete.success'));
        }
        return $this->errorResponse(trans('global.delete.fail'));
    }

    public function categoriesUpdate(Request $request, int $id)
    {
        $result = $this->categories->categoriesUpdate(array_merge($request->all(), compact('id')));
        if (!empty($result)) {
            return $this->successResponse([], trans('global.update.success'));
        }
        return $this->errorResponse(trans('global.update.fail'));
    }
}