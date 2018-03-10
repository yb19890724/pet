<?php
/*
|--------------------------------------------------------------------------
| Repository Config
|--------------------------------------------------------------------------
|
|
*/
return [
    /**
     * 默认分页
     */
    'pagination' => [
        'limit' => 20
    ],
    /**
     * 数据缓存设置
     */
    'cache'      => [
        'enabled'    => true,
        'minutes'    => 10,
    ],
    /**
     * 排序设置
     */
    'order' => [
        'o',
    ],
    /**
     * 文件自动生成器
     */
    'generator'  => [
        'root_namespace' => 'App\\',
        'namespace' => [
            'controller'          => 'Backend',
            'repository_eloquent' => 'Repository\\Eloquent',
            'repository'          => 'Repository\\Contracts',
            'criteria'            => 'Architecture\\Criterias',
            'provider'            => 'Providers\\ArchitectureServiceProvider',
            'service'             => 'Services',
            'model'               => 'Models',
            'response'            => 'Http\\Responses',
            'filter'              => 'Repository\\Filters'
        ]
    ]
];
