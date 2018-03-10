<h1 align="center">phpno1-repository</h1>


<p align="center">

[![Latest Stable Version](https://poser.pugx.org/phpno1/repository/v/stable)](https://packagist.org/packages/phpno1/repository)
[![Total Downloads](https://poser.pugx.org/phpno1/repository/downloads)](https://packagist.org/packages/phpno1/repository)
[![Build Status](https://travis-ci.org/yb19890724/phpno1-repository.svg?branch=devlop)](https://travis-ci.org/yb19890724/phpno1-repository)


</p>

## 官方qq群
    qq:680531281

## 目录结构

+ Contracts  : 仓储业务抽象接口。
+ Criterias  : 全局通用业务抽取以及准对某一类业务的Scope。
+ Eloquent   : 仓储业务具体实现。
+ Exceptions : 仓储异常处理。
+ Filters    : 根据参数自动过滤和排序。
+ Traits     : Trait封装


- <a href="#installation">Installation</a>
    - <a href="#composer">安装</a>
    - <a href="#laravel">Laravel配置</a>
- <a href="#方法介绍">方法</a>
    - <a href="#Phpno1\Repository\Contracts\IRepository">IRepository</a>
- <a href="#基本使用">基本使用</a>
	- <a href="#创建模型">创建模型</a>


#### composer 安装
执行以下命令获取包的最新版本:

```php
    composer require phpno1/repository
```

## 使用要求

#### laravel版本 >= 5.5

#### 发布配置文件

```php
    php artisan vendor:publish --tag=repository
```

#### 注册到服务容器

说明：用命令生成仓储文件时(phpno1:entity和phpno1:repository)，会自动生成RepositoryServiceProvider文件。

```php
    # 在config/app.php中
    'providers' => [
        // ......
        App\Providers\RepositoryServiceProvider::class,
    ];
```


## 基本使用

### 创建模型


```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Test extends Model
    {
        //
    }
```

