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
Artisan::command('make:components {namespace} {name} {annotation}', function () {

    $namespace=$this->argument('namespace');
    $name=$this->argument('name');
    $annotation=iconv('GB2312','utf-8',$this->argument('annotation'));
    $include=lcfirst($name);//转化注入成员小写

    //控制器模板
    echo make_components(
        compact('namespace','name','include','annotation'),
        'resources/views/developmentTemplate/controller.txt',
        "app/Http/Controllers/{$namespace}/{$name}Controller.php"
    );

    //服务层模板
    echo make_components(
        compact('namespace','name','include','annotation'),
        'resources/views/developmentTemplate/service.txt',
        "app/Services/{$namespace}/{$name}Service.php"
    );

    //仓库层模板
    echo make_components(
        compact('namespace','name','include','annotation'),
        'resources/views/developmentTemplate/repository.txt',
        "app/Repositories/{$namespace}/{$name}Repository.php"
    );

})->describe('对应命名空间创建控制器,服务,仓库');