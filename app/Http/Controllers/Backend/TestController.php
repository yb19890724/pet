<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\TestService;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    private $test;

    public function __construct(TestService $Test)
    {
        $this->test=$Test;
    }
}