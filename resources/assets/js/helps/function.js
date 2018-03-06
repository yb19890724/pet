
import { Notification } from 'element-ui';
import routes from '../routes'


//提示重定向
export function notificationRedirect(title,url)
{
    let options={
        title: title,
        type: 'success'
    };
    Notification(options);
    setTimeout(function(){
       location.href=url;
    },1000);
    return false;
}

//提示刷新当前页面
export function notificationReload(title)
{
    let options={
        title: title,
        type: 'success'
    };
    Notification(options);
    setTimeout(function(){
        location.reload();
    },1000);
    return false;
}


