
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
}