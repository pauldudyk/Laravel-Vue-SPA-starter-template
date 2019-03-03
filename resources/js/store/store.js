import Vue from 'vue';
import Vuex from 'vuex';

import state from '@/js/store/state'
import getters from '@/js/store/getters'
import mutations from '@/js/store/mutations'
import actions from '@/js/store/actions'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state,
    getters,
    mutations,
    actions
});