<?php

namespace App\Repositories;

/* 后台仓库基础类 */
abstract class BaseRepository
{
    protected $bindModel;//绑定对应模型

    protected $model;//引用模型

    public function __construct()
    {
        $this->makeModel();//获取对应模型
    }

    //创建实例模型
    private function makeModel()
    {
        if (!class_exists($this->bindModel)){//检测绑定模型是否存在
            throw new Exception("Class {$this->bindModel} not exists");
        }else{
            $model=app()->make($this->bindModel);//放入到容器里面
        }
        return $this->model = $model;
    }
}