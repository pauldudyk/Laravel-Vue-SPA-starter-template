export default {
    loadUserData({commit}, token) {
        axios
            .get('/user/data?token=' + token)
            .then(response => {
                localStorage.setItem('accessToken', token);
                commit('setUserData', response.data);
                commit('setAuthorisedUser', true);
            })
            .catch(error => {
                commit('setUserData', {});
                commit('setAuthorisedUser', false);
                localStorage.removeItem('accessToken');
            });
    },
    logoutUser({commit}, token) {
        axios
            .get('/user/logout?token=' + token)
            .then(response => {
                localStorage.removeItem('accessToken');
                commit('setUserData', {});
                commit('setAuthorisedUser', false);
            })
            .catch(error => {
                console.log('error while logging out');
            });
    }
}