
export default [
    {
        path: '/dashboard',
        component: require('./views/backend/layouts/Home.vue'),
        beforeEnter:requireAuth,
        children: [
            {
                path: '/',
                redirect: '/dashboard/home'
            },
            {
                path: 'home',
                component: require('./views/backend/layouts/Main.vue')
            },
            {
                path: 'zoo',
                component: require('./views/backend/layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        name:'zooHome',
                        component: require('./views/backend/zoo/Home.vue')
                    },
                    {
                        path: 'create',
                        name:'zooCreate',
                        component: require('./views/backend/zoo/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        name:'zooEdit',
                        component: require('./views/backend/zoo/Edit.vue')
                    },
                    {
                        path: 'box',
                        component: require('./views/backend/layouts/ModuleView.vue'),
                        children: [
                            {
                                path: '/',
                                name:'boxHome',
                                component: require('./views/backend/box/Home.vue')
                            },
                            {
                                path: 'create',
                                name:'boxCreate',
                                component: require('./views/backend/box/Create.vue')
                            },
                            {
                                path: ':id/edit',
                                name:'boxEdit',
                                component: require('./views/backend/box/Edit.vue')
                            }
                        ]
                    }
                ]
            },
            {
                path: 'food',
                component: require('./views/backend/layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        name:'foodHome',
                        component: require('./views/backend/food/Home.vue')
                    },
                    {
                        path: 'create',
                        name:'foodCreate',
                        component: require('./views/backend/food/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        name:'foodEdit',
                        component: require('./views/backend/food/Edit.vue')
                    },
                    {
                        path: 'category',
                        component: require('./views/backend/layouts/ModuleView.vue'),
                        children: [
                            {
                                path: '/',
                                name:'foodCategoryHome',
                                component: require('./views/backend/category/Home.vue')
                            },
                            {
                                path: 'create',
                                name:'foodCategoryCreate',
                                component: require('./views/backend/category/Create.vue')
                            },
                            {
                                path: ':id/edit',
                                name:'foodCategoryEdit',
                                component: require('./views/backend/category/Edit.vue')
                            }
                        ]
                    }
                ]
            },
            {
                path: 'gene',
                component: require('./views/backend/layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        name:'geneHome',
                        component: require('./views/backend/gene/Home.vue')
                    },
                    {
                        path: 'create',
                        name:'geneCreate',
                        component: require('./views/backend/gene/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        name:'geneEdit',
                        component: require('./views/backend/gene/Edit.vue')
                    }
                ]
            },
            {
                path: '*',
                redirect: '/dashboard'
            }
        ]
    }
]

//是否登陆
function requireAuth (to, from, next) {
    //这里验证是否登录
    return next();

    /*if (window.User) {
        return next();
    }else{
        return next('/')
    }*/
}