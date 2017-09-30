import * as types from './types';

export  default {
    postRequest ({ commit }, url) {
        commit('alertTip', url);
    },
    dataList: ({commit}, method, params)=>commit(method,params)
}