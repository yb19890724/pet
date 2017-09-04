<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

//创建 组件文件
Artisan::command('make:components {namespace} {name}', function () {

    $namespace=$this->argument('namespace');
    $name=$this->argument('name');
    $include=lcfirst($name);//转化注入成员小写

    //控制器模板
    $controller=File::get('resources/views/developmentTemplate/controller.txt');//获取控制器模板
    $controller=str_replace('{namespace}',$namespace,$controller);
    $controller=str_replace('{name}',$name,$controller);
    $controller=str_replace('{include}',$include,$controller);
    $controllerPath="app/Http/Controllers/{$namespace}/{$name}Controller.php";

    File::put($controllerPath,$controller);
    echo 'controller path:'.$controllerPath.PHP_EOL;

    //服务层模板
    $service=File::get('resources/views/developmentTemplate/service.txt');
    $service=str_replace('{namespace}',$namespace,$service);
    $service=str_replace('{name}',$name,$service);
    $service=str_replace('{include}',$include,$service);
    $servicePath="app/Services/{$namespace}/{$name}Service.php";
    File::put($servicePath,$service);
    echo 'service path:'.$servicePath.PHP_EOL;

    //仓库层模板
    $repository=File::get('resources/views/developmentTemplate/repository.txt');
    $repository=str_replace('{namespace}',$namespace,$repository);
    $repository=str_replace('{name}',$name,$repository);
    $repositoryPath="app/Repositories/{$namespace}/{$name}Repository.php";
    File::put($repositoryPath,$repository);
    echo 'repository path:'.$repositoryPath.PHP_EOL;

    /*//模型模板
    $model=File::get('resources/views/createTemplate/backend/model.txt');
    $model=str_replace('{namespace}',$namespace,$model);
    $model=str_replace('{name}',$name,$model);
    $modelPath="app/Models/{$namespace}/{$name}Model.php";
    File::put($modelPath,$model);
    echo 'model path:'.$modelPath.PHP_EOL;

    //创建对应js
    $jsFileDirName=lcfirst($namespace);//js创建文件夹小写
    $jsPath="public/{$jsFileDirName}/js/{$include}.js";
    File::put($jsPath,'');
    echo 'js js:'.$jsPath.PHP_EOL;*/


})->describe('对应命名空间创建控制器,服务,仓库');