<h2>宠物饲养管理后台</h2>

## 前言:

<p>帮朋友做的本地管理宠物项目，也是为了学习前后端分离开发的方式。过程中体会到了开源的不易，但是通过大家的帮助收获也非常大，后面会坚持维护更新下去。
如果觉得不错希望大家给个star，有建议请直接怼 *^_^*给我一个提高的过程，谢谢大家!</p>
    
## 项目架构:laravel5.5+vue2+element-ui
    
###  前端:

<p>由于重心还是在后端，前端代码和目录分层，直接借鉴<a href="https://github.com/jcc/blog">jcc的blog项目</a>（这里感谢他的开源项目）</p>
     
###  后台:

#### 后端架构: 
   
   + Controller : 控制器
   + Responses  : 响应层
   + Routes     : 路由(拆分处理)
   + Services   : 服务层
   + Repository : 仓库层
   + Filters    : 根据参数自动过滤和排序。
   + Models     : 模型。
   + Libraries  : 扩展
   
<p>由于分层比较多所以和朋友封装了一个扩展包:用命令一键生成<a href="https://github.com/yb19890724/phpno1-architecture">项目架构扩展包</a></p>

### 安装

## 使用要求:

#### laravel版本 >= 5.5
#### php版本     >= 7.1

### 安装laravel扩展
```php
    composer update
```

### 配置laravel

```php
     copy .env.example .env
```

```php
    php artisan key:generate 
```

```php
    
    //编辑.env配置你的数据库配置
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    
```

```php
    //发布迁移文件
    php artisan migrate
```

### 安装js扩展

```js
    npm install
```

### 编译js代码：

```js
    npm run dev
    
    // OR
    
    npm run watch
    
    // OR
    
    npm run production
```

### 数据：这里没有给大家提供测试数据

<p>按照以下顺序添加就可以进行测试</p>

   + 食品分类   
   + 食品     
   + 基因     
   + 饲养箱     
   + 宠物     
   + 宠物成长记录     
   + 宠物喂养记录    