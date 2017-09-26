
export default [
    {
        path: '/backend',
        component: require('./views/backend/Dashboard.vue'),
        beforeEnter:requireAuth,
        children: [
            {
                path: '/',
                redirect: '/backend/home'
            },
            {
                path: 'home',
                component: require('./views/backend/Home.vue')
            },
            {
                path: 'test',
                component: require('./views/backend/test.vue')
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