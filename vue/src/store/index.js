import { createStore } from 'vuex'
import axiosClient from '../axiosClient'

const store = createStore({
    state: {
        iconStatus: false

    },
    getters: {},
    mutations: {
        setTrue(state, data) {
            state.iconStatus = data;
        }

    },
    actions: {
        getLocalStorageData: ({ commit }) => {
            if (localStorage.getItem('orderDetail') != null) {
                let data = true;
                console.log(data, 'from');
                commit('setTrue', data);
            }
        }



    }
})

export default store;