import { createStore } from 'vuex';
import moduleAuth from './auth';
const store = createStore({
    modules: {
        moduleAuth,
    },
});

export default store;
