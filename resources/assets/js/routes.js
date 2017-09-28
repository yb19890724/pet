
export default [
    {
        path: '/backend',
        component: require('./views/backend/Layouts/Home.vue'),
        beforeEnter:requireAuth,
        children: [
            {
                path: '/',
                redirect: '/backend/home'
            },
            {
                path: 'home',
                component: require('./views/backend/Layouts/Main.vue')
            },
            {
                path: 'dictionary',
                component: require('./views/backend/Layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        component: require('./views/backend/Dictionary/Home.vue')
                    }
                ]
            },
            {
                path: 'center',
                component: require('./views/backend/Layouts/ModuleView.vue'),
                children: [
                    {
                        path: '/',
                        component: require('./views/backend/Center/Home.vue')
                    }
                ]
            },
            {
                path: '*',
                redirect: '/backend'
            }
        ]
    }
]

//是否登陆
function requireAuth (to, from, next) {
    //这里验证是否登录
    return next();
}