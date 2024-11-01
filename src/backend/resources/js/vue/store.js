import { createStore } from 'vuex';

const store = createStore({
    state () {
        return {
            warehouse: null,
        }
    },
    mutations: {
        updateWarehouse (state, warehouse) {
            state.warehouse = warehouse;
        },
    }
})

export default store;
