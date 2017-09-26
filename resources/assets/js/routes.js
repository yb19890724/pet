
export default [
    {
        path: '/backend',
        component: require('./views/backend/Dashboard.vue'),
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
                path: '*',
                redirect: '/backend'
            }
        ]
    }
]

//是否登陆
function requireAuth (to, from, next) {
    return next();
}