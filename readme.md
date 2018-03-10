<!--
<h2>laravel框架开发项目架构扩展包</h2>


<p align="center">

[![Latest Stable Version](https://poser.pugx.org/phpno1/architecture/v/stable)](https://packagist.org/packages/phpno1/architecture)
[![Total Downloads](https://poser.pugx.org/phpno1/architecture/downloads)](https://packagist.org/packages/phpno1/architecture)
[![Build Status](https://travis-ci.org/yb19890724/phpno1-architecture.svg?branch=master)](https://travis-ci.org/yb19890724/phpno1-architecture)
[![License](https://poser.pugx.org/phpno1/architecture/license)](https://packagist.org/packages/phpno1/architecture)

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
	- <a href="#创建控制器">创建控制器</a>
	- <a href="#创建模型">创建模型</a>
    - <a href="#创建服务层">创建服务层</a>

- <a href="#代码生成器">代码生成器</a>
	- <a href="#创建组合配置">创建组合配置</a>
	- <a href="#创建校验">创建校验</a>
	- <a href="#创建控制器">创建控制器</a>
    - <a href="#创建服务层">创建服务层</a>
    - <a href="#创建仓库">创建仓库</a>
    - <a href="#创建全局限制类">创建全局限制类</a>
    - <a href="#创建模型">创建模型</a>
    - <a href="#创建服务器提供者">创建服务器提供者</a>
    - <a href="#创建种子文件">创建种子文件</a>


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

#### 创建组合配置

    ```php
           php artisan phpno1:entity {name} {--resource}
       ```

        生成以下文件:
            1.控制器       controller
            2.校验文件     request
            3.数据处理文件 response
            4.业务处理文件 service
            5.数据映射文件 repository
            6.模型文件     model
            7.种子文件     seeder
            8.服务提供者   provider
            9.过滤条件     filter

- 创建校验 继承laravel request
    ```terminal
    php artisan phpno1:request {name} {--dir=}
    ```

- 创建控制器
    ```terminal
        php artisan phpno1:controller {name} {--resource}
    ```
    ```php
    <?php

    namespace App\Http\Controllers\Backend;

    use App\Http\Responses\UserIndexResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Services\UserService;

    class FoodCategoryController extends Controller
    {
        private $userService;

        public function __construct(UserService $userService)
        {
            $this->userService=$userService;
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $result=$this->userService->getUserList();
            return new UserIndexResponse($result);
        }
    ```

### 创建数据处理层
####  php artisan phpno1:response {name} {--dir=}
```php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class FoodCategoryIndexResponse implements Responsable
{
    use ResponseTrait;

    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        $data = $this->transform();

        return $data;
    }

    protected function transform()
    {
        $this->result->getCollection()->transform(function ($user) {
            return [
                'id'           => $user->id,
                'name'         => $user->name,
                'sort'         => $user->sort
            ];
        });

        return $this->responseJson($this->result);
    }
}
```


### 创建服务层
#### php artisan phpno1:service {name} {--resource}

```php

namespace App\Services;

use App\Repository\Contracts\UserRepository;

class UserService
{
    /**
     * @var UseryRepositoryEloquent
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
```

### 生成仓库类
#### php artisan phpno1:repository {name}

```php
namespace App\Repositories\Eloquent;

use App\User;

class UserRepositoryEloquent extends AbstractRepository implements UserRepository
{
    // 绑定User模型
    public function entity()
    {
        return User::class;
    }

    // 其他仓储方法...
```

### 创建模型 继承 laravel Model
#### php artisan phpno1:model {name}

```php
<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        //
    }
```

### 创建种子文件 继承 laravel Seeder
#### php artisan phpno1:seeder {name}

 -->

