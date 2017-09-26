import Auth from './views/backend/Auth.vue';
import Login from './views/backend/Login.vue';

export default [
    {
        path: '/backend',
        component: Auth,
        beforeEnter: requireAuth,
        children: [
            {
                path: '/',
                redirect: '/backend/login'
            },
            {
                path: 'login',
                component: Login
            }
        ]
        /*path: '/backend',
         component: Home,
         beforeEnter: requireAuth,
         children: [
         {
         path: '/',
         redirect: '/backend/home'
         },
         {
         path: 'home',
         component: require('./views/backend/main/Main.vue')
         },
         {
         path: 'rule',
         component: ModuleView,
         children: [
         {
         path: '/',
         component: require('./views/backend/rule/Rule.vue')
         },
         {
         path: '/create',
         component: require('./views/backend/rule/Create.vue')
         }
         ]
         },
         {
         path: 'admin',
         component: ModuleView,
         children: [
         {
         path: '/',
         component: require('./views/backend/admin/Admin.vue')
         },
         {
         path: '/create',
         component: require('./views/backend/rule/Create.vue')
         }
         ]
         },
         {
         path: '*',
         redirect: '/backend'
         }
         ]*/
    },
    {
        path: '*',
        redirect: '/backend'
    }
]

//是否登陆
function requireAuth (to, from, next) {
    console.log(to);

    return next();
}