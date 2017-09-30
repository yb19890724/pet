import axios from 'axios'
import { fetchData,saveData } from '../helps/http';
import * as types from './types';


export default {
    alertTip(state, url){
        axios.get('/role')
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    },
    FETCH_ROLE_DATA(state, params){//角色列表
        fetchData('role/lists', params)
            .then(response=> {
                if (response.code == 'success' && response.data != '') {
                    state.tableData = response.data;
                }
            }).catch(function (error) {
            console.log(error);
        });
    }
}