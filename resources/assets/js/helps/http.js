import axios from 'axios';
import { backendApi } from '../config/backend/config';
import { notificationError } from './helps';

/**
 * Create Axios
 */
export const http = axios.create({
    baseURL: backendApi
});

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
http.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Handle all error messages.
 */
http.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    const { response } = error;

    if ([401].indexOf(response.status) >= 0) {
        if (response.status == 401 && response.data.error.message != 'Unauthorized') {
            return Promise.reject(response);
        }
        window.location = '/login';
    }

    if([422].indexOf(response.status) >= 0){
        let message = response.message;
        for(var i in response.data.errors){
            message = response.data.errors[i][0];
        }
        notificationError(message);
    }

    return Promise.reject(error);
});

export default function install(Vue) {
    Object.defineProperty(Vue.prototype, '$http', {
        get() {
            return http
        }
    })
}