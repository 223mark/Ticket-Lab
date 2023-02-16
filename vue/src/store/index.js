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








    }
})

export default store;