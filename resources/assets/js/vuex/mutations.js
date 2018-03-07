import axios from 'axios'
import { fetchData,postData } from '../helps/http';
import * as types from './types';


export default {
    getFoodCategoryList(state, params){//食物分类列表
        fetchData('/food/category?page=2', params)
            .then(response=> {
                if (response.data != '') {

                    console.log(response.data);
                    state.tableData = response.data.data;
                }
            }).catch(function (error) {
            console.log(error);
        });
    },
    getFoodCategoryDetail(state,params){//食物分类详情
        fetchData('/food/category/' + state.pathParams.id, params)
            .then(response=> {
                if (response.data != '') {
                    state.findData = response.data;
                }
            }).catch(function (error) {
            console.log(error);
        });
    }
}