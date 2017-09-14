<?php

//自定义函数库扩展

if (!function_exists('make_components')) {
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
if(!function_exists('get_current_action')){
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
if(!function_exists('filter_retention'))
{
    function filter_retention($params)
    {
        $result=array_filter($params,function($item){
            return $item==='0' || !empty($item)?true:false;
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
function coupon_number()
{
    list($second,$millisecond)=explode('.',microtime(true));
    return substr($second,6).rand($millisecond,9999).rand(1000,9999);
}