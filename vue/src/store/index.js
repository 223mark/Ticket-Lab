import { createStore } from 'vuex'
import axiosClient from '../axiosClient'

const store = createStore({
    state: {
        selectedDate: null,
        location: {},




    },
    getters: {},
    mutations: {
        // setLocation(state, data) {
        //     state.location = data;
        // }
        setSelectedDate(state, selectedDate) {
            state.selectedDate = selectedDate
        },
    },
    actions: {

        //get selected date
        async getSelectedDate({ commit }, selectedDate) {
            commit('setSelectedDate', selectedDate)
        }





    }
})

export default store;