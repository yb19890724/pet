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
