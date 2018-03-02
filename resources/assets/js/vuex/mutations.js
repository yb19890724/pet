import axios from 'axios'
import { fetchData,postData } from '../helps/http';
import * as types from './types';


export default {
    fetchFoodCategory(state, url,params){//角色列表
        fetchData('/food/category', params)
            .then(response=> {
                if (response.data != '') {
                    state.tableData = response.data;
                }
            }).catch(function (error) {
            console.log(error);
        });
    }
}