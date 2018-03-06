
import { Notification } from 'element-ui';


//提示重定向
export function notificationRedirect(title,callback)
{
    let options={
        title: title,
        type: 'success'
    };
    Notification(options);
    setTimeout(function(){
        callback();
    },1000);
    return false;
}

//提示刷新当前页面
export function notificationReload(title,callback)
{
    let options={
        title: title,
        type: 'success'
    };
    Notification(options);
    setTimeout(function(){
        callback();
    },1000);
    return false;
}


