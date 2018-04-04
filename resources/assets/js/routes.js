
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
                path: 'pet',
                component: require('./views/backend/layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        name:'petHome',
                        component: require('./views/backend/pet/Home.vue')
                    },
                    {
                        path: 'create',
                        name:'petCreate',
                        component: require('./views/backend/pet/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        name:'petEdit',
                        component: require('./views/backend/pet/Edit.vue')
                    },
                    {
                        path: ':id/growth',
                        name:'growthHome',
                        component: require('./views/backend/growth/Home.vue')
                    },
                    {
                        path: ':id/growth/create',
                        name:'growthCreate',
                        component: require('./views/backend/growth/Create.vue')
                    },
                    {
                        path: 'growth/:id/edit',
                        name:'growthEdit',
                        component: require('./views/backend/growth/Edit.vue')
                    },
                    {
                        path: ':id/feeding',
                        name:'feedingHome',
                        component: require('./views/backend/feeding/Home.vue')
                    },
                    {
                        path: ':id/feeding/create',
                        name:'feedingCreate',
                        component: require('./views/backend/feeding/Create.vue')
                    },
                    {
                        path: 'feeding/:id/edit',
                        name:'feedingEdit',
                        component: require('./views/backend/feeding/Edit.vue')
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
    if (window.User) {
        return next();
    }else{
        return next('/')
    }
}