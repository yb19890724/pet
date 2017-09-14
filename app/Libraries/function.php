<?php

//自定义函数库扩展

/**
 * @desc:
 * @auth:   hyb
 * @date:   2017/9/4
 * @time:   8:35
 * @param:  $namespace 命令空间
 * @param:  $name      文件名称
 * @param:  $filePath  文件路径
 * @return: crea file
 */
if (!function_exists('make_components')) {
    function make_components(array $params, string $filePath, string $makeFilePath)
    {
        $fileContents = File::get($filePath);//获取控制器模板
        $fileContents = str_replace('{namespace}', $params['namespace'], $fileContents);
        $fileContents = str_replace('{name}', $params['name'], $fileContents);
        $fileContents = str_replace('{include}', $params['include'], $fileContents);
        $fileContents = str_replace('{annotation}', $params['annotation'], $fileContents);
        File::put($makeFilePath, $fileContents);
        return 'file path:' . $makeFilePath . PHP_EOL;
    }
}

/**
 * @desc:   存在且不是空 isset && !empty
 * @auth:   hyb
 * @date:   2017/9/4
 * @time:   15:06
 * @param:  $key    判断key
 * @param:  $params 判断数组
 * @return: bool
 */
if (!function_exists('existence')) {
    function existence($params, string $key)
    {
        return (isset($params[$key]) && !empty($params[$key])) ? true : false;
    }
}

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
    function filter_retention($params)
    {
        $result = array_filter($params, function ($item) {
            return $item === '0' || !empty($item) ? true : false;
        });
        return $result;
    }

}

/**
 * @desc:   生成卡券券码
 * @auth:   hyb
 * @date:   2017/8/7
 * @time:   16:36
 * @param:
 * @return: string
 */
if (!function_exists('coupon_code')) {
    function coupon_code()
    {
        list($second, $millisecond) = explode('.', microtime(true));
        return substr($second, 6) . rand($millisecond, 9999) . rand(1000, 9999);
    }
}

/**
 * @desc:
 * @auth:   hyb
 * @date:   2017/9/14
 * @time:   12:53
 * @param:
 * @return:
 */
if (!function_exists('create_config')) {
    function create_config(string $filePath, array $fileContent)
    {
        $filePath = base_path() . '/config/' . $filePath;
        $fileContent = "<?php \n\n return ".var_export(array_values($fileContent), true).";";
        return File::put($filePath, $fileContent);
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
                $items[$item['parent_id']]['son'][] = &$items[$key];
            }else if(!empty($item['id'])){
                $tree[$item['id']] = &$items[$key];
            }
        }
        return $tree;
    }

}