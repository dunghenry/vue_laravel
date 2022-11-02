const moduleAuth = {
    state: () => ({
        currentUser: {},
        error: '',
        users: [
            {
                username: 'TranDung',
                password: 'trandung2001',
            },
            {
                username: 'Admin',
                password: 'admin',
            },
            {
                username: 'User',
                password: 'user',
            },
        ],
    }),
    getters: {
        // get_current_user(state) {
        //     return state.currentUser;
        // },
    },
    mutations: {
        // LOGIN(state, payload) {
        //     const user = state.users.find((user) => user.username === payload.username);
        //     if (user) {
        //         if (user.password === payload.password) {
        //             state.currentUser = user;
        //             payload.router.push('/');
        //         } else {
        //             state.error = 'Invalid password';
        //         }
        //     } else {
        //         state.error = 'User not found';
        //     }
        // },
        // LOGOUT(state, router) {
        //     state.currentUser = {};
        //     router.push('/login');
        // },
    },
};

export default moduleAuth;
