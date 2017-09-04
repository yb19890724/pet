<?php

namespace App\Repositories;

use DB;

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

    /**
     * @desc:   公用分页方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   10:27
     * @param:  $params  当前页
     * @param:  $columns 查询字段
     * @param:  $limit   返回记录数
     * @return: array
     */
    public function paginate(array $where,array $columns = ['*'],string $limit='')
    {
        echo 1;exit;
       /* $this->applyConditions($where)
             ->model->paginate($limit,$columns);
        return $this;*/
    }

    /**
     * @desc:   公用添加方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   10:45
     * @param:
     * @return: array
     */
    public function create(array $attributes)
    {

    }

    /**
     * @desc:   公用修改方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   10:45
     * @param:
     * @return: array
     */
    public function update(array $where,array $attributes)
    {

    }

    /**
     * @desc:   公用删除方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   10:46
     * @param:
     * @return: boolean
     */
    public function destroy(array $where)
    {

    }

    /**
     * @desc:   构建where 条件
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   10:55
     * @param:
     * @return:
     */
    private function applyConditions(array $where)
    {
        $this->model->applyConditions($where);
        return $this;
    }

    /**
     * @desc:   事务处理方法
     * @auth:   hyb
     * @date:   2017/9/4
     * @time:   11:14
     * @param:  $transaction 闭包函数
     * @return: array
     */
    public function transaction(callable $transaction)
    {
        DB::beginTransaction();
        $result = $transaction();
        if(isset($result['fail'])){
            DB::rollBack();
            return $result;
        }
            DB::commit();
        return $result;
    }



}