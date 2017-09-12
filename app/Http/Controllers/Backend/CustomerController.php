<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\Backend\CustomerService;

/* 用户控制器 */

class CustomerController extends BackendController
{
    private $customer;

    public function __construct(CustomerService $Customer)
    {
        $this->customer=$Customer;
    }
}