
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
                        component: require('./views/backend/zoo/Home.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/backend/zoo/Create.vue')
                    },
                    {
                        path: 'edit',
                        component: require('./views/backend/zoo/Edit.vue')
                    }
                ]
            },
            {
                path: 'food',
                component: require('./views/backend/layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        component: require('./views/backend/food/Home.vue')
                    },
                    {
                        path: 'create',
                        name:'foodCreate',
                        component: require('./views/backend/food/Create.vue')
                    },
                    {
                        path: 'edit/:id',
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
                                path: 'edit/:id',
                                name:'foodCategoryEdit',
                                component: require('./views/backend/category/Edit.vue')
                            }
                        ]
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