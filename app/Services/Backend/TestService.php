<?php

namespace App\Services\Backend;

use App\Repositories\Backend\TestRepository;

class TestService
{
    private $Test;

    public function __construct(TestRepository $Test)
    {
        $this->test=$Test;
    }

}