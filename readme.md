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
    - <a href="#prettusrepositorycontractsrepositoryinterface">RepositoryInterface</a>
    - <a href="#prettusrepositorycontractsrepositorycriteriainterface">RepositoryCriteriaInterface</a>
    - <a href="#prettusrepositorycontractscacheableinterface">CacheableInterface</a>
    - <a href="#prettusrepositorycontractspresenterinterface">PresenterInterface</a>
    - <a href="#prettusrepositorycontractscriteriainterface">CriteriaInterface</a>
- <a href="#usage">Usage</a>
	- <a href="#create-a-model">Create a Model</a>
	- <a href="#create-a-repository">Create a Repository</a>
	- <a href="#generators">Generators</a>
	- <a href="#use-methods">Use methods</a>
	- <a href="#create-a-criteria">Create a Criteria</a>
	- <a href="#using-the-criteria-in-a-controller">Using the Criteria in a Controller</a>
	- <a href="#using-the-requestcriteria">Using the RequestCriteria</a>
- <a href="#cache">Cache</a>
    - <a href="#cache-usage">Usage</a>
    - <a href="#cache-config">Config</a>
- <a href="#validators">Validators</a>
    - <a href="#using-a-validator-class">Using a Validator Class</a>
        - <a href="#create-a-validator">Create a Validator</a>
        - <a href="#enabling-validator-in-your-repository-1">Enabling Validator in your Repository</a>
    - <a href="#defining-rules-in-the-repository">Defining rules in the repository</a>
- <a href="#presenters">Presenters</a>
    - <a href="#fractal-presenter">Fractal Presenter</a>
        - <a href="#create-a-presenter">Create a Fractal Presenter</a>
        - <a href="#implement-interface">Model Transformable</a>
    - <a href="#enabling-in-your-repository-1">Enabling in your Repository</a>




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

## 命令

说明：使用命令创建仓储文件时(phpno1:entity和phpno1:repository)，会自动绑定接口与实现类关系。

####  生成组合配置
```php
    php artisan phpno1:entity {name} {--resource}
```

####  生成控制器
```php
    php artisan phpno1:controller {name} {--resource}
```

####  生成扩展全局限制类
```php
    php artisan phpno1:criteria {name}
```

#### 生成过滤类
```php
    php artisan phpno1:filter {name} {--prefix=} {--sort}
```

#### 生成模型类
```php
    php artisan phpno1:model {name}
```

#### 生成服务器提供者,用于接口绑定实体类
```php
    php artisan phpno1:provider
```

#### 生成仓库类
```php
    php artisan phpno1:repository {name}
```

#### 生成校验类
```php
    php artisan phpno1:request {name} {--dir=}
```

#### 生成响应类
```php
    php artisan phpno1:response {name} {--dir=}
```

#### 生成种子文件
```php
    php artisan phpno1:seeder {name}
```

#### 生成服务类
```php
    php artisan phpno1:service {name} {--resource}
```

## 用法

```php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // something...
}
```

#### 创建仓库
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
}
```

## 使用仓库

+ 注入到controller中，或者serveric层中使用。
```php
class UserController extends Controller
{
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}

```

## 方法介绍

### Phpno1\Repository\Contracts\IRepository;

- function entity();
- function all();
- function find(int $id);
- function first();
- function count();
- function findWhere(...$condition);
- function findWhereFirst(...$condition);
- function findWhereCount(...$condition);
- function paginate(int $perPage = 10);
- function create(array $properties);
- function update(int $id, array $properties);
- function delete(int $id);
- function withCriteria(...$criteria);
- function toEntity();
- function toRepository(Builder $entity);

### Phpno1\Repository\Eloquent;


  ```php
    // 获取所有记录
    $this->repository->all();
  ```

  ```php
    // 根据id查询单条记录
    $this->repository->find(int $id);
  ```

  ```php
    // 获取第一条记录
    $this->repository->first();
  ```

  ```php
    // 获取总记录数
    $this->repository->count();
  ```

  ```php
    // 根据一个或多个 AND WHERE 条件查询。得到一个结果集
    // 单个条件写法：->findWhere('name', 'tome');
    // 多个条件写法：->findWhere(['name', 'tome'], ['age', '>', 20]);
    $this->repository->findWhere(...$condition);
  ```

  ```php
    // 根据一个或多个 AND WHERE 条件查询。得到一条记录。
    $this->repository->findWhereFirst(...$condition);
  ```

  ```php
    // 根据一个或多个 AND WHERE 条件获取记录数
    $this->repository->findWhereCount(...$condition);
  ```

  ```php
    // 获取分页数据
    $this->repository->paginate(int $perPage = 10);
  ```

  ```php
    // 插入记录
    $this->repository->create(array $properties);
  ```

  ```php
    // 修改记录
    $this->repository->update(int $id, array $properties);
  ```

  ```php
    // 根据id删除
    $this->repository->delete(int $id);
  ```

  ```php
    // 用于加载预设的自定义标准操作 (Criterias目录中的类)，后面会详细介绍
    $this->repository->withCriteria(...$criteria);
  ```

  ```php
    // 把Repository转换成Model或者Build对象，后续可以使用框架提供的ORM操作
    $this->repository->toEntity();
  ```

  ```php
    // 把Build对象转回Repository对象
    $this->repository->toRepository(Builder $entity);
  ```

## Use methods

#### 基本使用

```php

public function getUserList()
{
    return $this->repository->paginate();
}

```

#### 当Repository提供的method无法满足业务
```php
public function do()
{
    // 使用toEntity() 转换回Model或Build对象
    return $this->repository
        ->toEntity()
        ->where(...)
        ->orWhere(...)
        ->when(...)
        ->get(...);
}
```
## Use Criteria

#### 编写Criteria类

```php
namespace App\Repositories\Criterias;

class ByCreateTime implements ICriteria
{
    public function apply($entity)
    {
        return $entity->latest();
    }
}
```

#### 使用Criteria类
```php

public function getUserListByCreateTime()
{
    return $this->repository
        ->withCriteria(
            new ByCreateTime()
            // more...
        )->paginate();
}

```
## Use Filter And Sort

#### 在Repository中配置要过滤和排序的映射字段
```php
class UserRepositoryEloquent extends AbstractRepository implements UserRepository
{
    // 设置过滤映射
    protected $filters = [
        'email'    => EmailFilter::class,
        'name'     => NameFilter::class,
    ];

    public function entity()
    {
        return Admin::class;
    }

    // 过滤和排序在withCriteria中添加过滤和排序操作类FilterRequest
    public function findUserListByPage()
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate();
    }

    // something...
}
```

#### 编写要过滤的业务

```php
namespace App\Repositories\Filters\User;

use App\Repositories\Filters\AbstractFilter;

class NameFilter extends AbstractFilter
{
    // 过滤操作
    public function filter($entity, $value)
    {
        return $entity->where('name', $value);
    }
}
```

#### 编写要排序的业务
```php
namespace App\Repositories\Filters\Admin;

use App\Repositories\Filters\{
    AbstractFilter,
    IOrder
};

// 需要排序，必须实现排序接口
class NameFilter extends AbstractFilter implements IOrder
{
    // 过滤操作
    public function filter($entity, $value)
    {
        return $entity->where('name', $value);
    }

    // 排序操作
    public function order($entity, $direction)
    {
        return $entity->orderBy('name', $this->resolveOrderDirection($direction));
    }
}
```

#### 传递参数进行过滤操作

```php
 // 过滤name和email
 http://www.phpno1.com/user/list?name=Anthony&email=king19800105@163.com

 // 过滤和排序组合。参数"o"表示排序方式。参数"orderable"表示要排序的字段
 http://www.phpno1.com/user/list?name=Anthony&email=king19800105@163.com&o=desc&orderable=name
```

#### 使用CacheGenerate的trait特性

用途：当使用redis或memcahce做缓存时，方便做数据缓存操作。当然，您也可以使用Laravel框架提供的Cache。

```php
    public function getUserList()
    {
        // 参数1：缓存的key值
        // 缓存中有数据则从缓存中取，没有数据则从数据库取一次放入缓存。
        $this->getOrCache('getUserList', function () {
            return $this->paginate();
        });
    }
```



#### 注意事项

+ 建议文件生成都使用命令来操作。
+ 过滤必须要继承AbstractFilter (有特殊需求的可以实现IFilter接口) ，过滤必须实现IOrder接口。
+ 过滤和排序都是可选的。
+ 通过重写过滤中的mappings()方法来改变数据库字段和过滤使用的参数映射关系。
+ 通过重写AbstractFilter中的resolveOrderDirection()方法来改变排序方式的映射关系。





