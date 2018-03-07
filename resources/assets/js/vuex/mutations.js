import axios from 'axios'
import { fetchData } from '../helps/http';
import * as types from './types';


export default {

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