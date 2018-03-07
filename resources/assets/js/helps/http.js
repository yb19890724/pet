import axios from 'axios'
import { backendApi } from '../config/backend/config';

axios.defaults.baseURL=backendApi;
axios.defaults.timeout = 5000;
axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};


export function fetchData(url, params={}) {
    return new Promise((resolve, reject) => {
        axios.get(url,params).then(response => {
            if(response.status==200){
                resolve(response.data);
            }
        }).catch(error => {
            var message = error.message;
            if (error.response.status == 422) {
                for(var i in error.response.data){
                    message = error.response.data[i][0];
                }
            }
            if (error.response.status == 401) {
                window.location = '/login';
            }
            reject(message)
        });
    })
}

export function handleData(url, method , params={}) {
    return new Promise((resolve, reject) => {
        axios({
            method: method,
            url: url,
            data: params
        }).then(response => {
            resolve(response);
        }).catch(error => {
            var message = error.message;
            if (error.response.status == 422) {
                for(var i in error.response.data){
                    message = error.response.data[i][0];
                }
            }
            reject(message)
        });
    })
}