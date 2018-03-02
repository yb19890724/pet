<?php

/**
 * @desc:   获取访问控制器和控制器内部方法
 * @date:   2016/12/21 0021
 * @Time:   14:51
 * @author: hyb
 * @param:  $response 响应对象
 * @return: array
 */
if (!function_exists('get_current_action')) {
    function get_current_action()
    {
        $action = Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        return ['controller' => $class, 'method' => $method];
    }
}


/**
 * @desc:   过滤数组空保留0
 * @auth:   hyb
 * @date:   2017/8/15
 * @time:   9:44
 * @param:
 * @return: array
 */
if (!function_exists('filter_retention')) {
    function filter_retention(array $params)
    {
        $result = array_filter($params, function ($item) {
            return $item === '0' || !empty($item) ? true : false;
        });
        return $result;
    }

}

/**
 * @desc:   无限级分类方法
 * @auth:   hyb
 * @date:   2017/9/14
 * @time:   14:00
 * @param:  $items 多维数据数组
 * @return: array
 */
if (!function_exists('generate_tree')) {
    function generateTree(array $items)
    {
        $tree = [];
        array_unshift($items,['id' => 0, 'parent_id' => 0, 'name' => '']);
        foreach($items as $key=>$item){
            if(!empty($item['parent_id'])){
                $items[$item['parent_id']]['sub'][] = &$items[$key];
            }else if(!empty($item['id'])){
                $tree[$item['id']] = &$items[$key];
            }
        }
        return $tree;
    }

}