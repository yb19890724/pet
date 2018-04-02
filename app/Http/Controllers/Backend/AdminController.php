<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;

class AdminController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware('backend.auth');
    }

    /**
     * get admin info
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdmin(Request $request)
    {
        return $this->responseJson($request->all());
    }
}
