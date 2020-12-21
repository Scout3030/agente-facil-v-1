import Vue from 'vue'
import Vuex from 'vuex'
import bank from './../modules/bank'
import transfer from './../modules/transfer'
import payment from './../modules/payment'
import bankOperation from './../modules/bankoperation'
import common from './../modules/common'


import VuexPersistence from 'vuex-persist'

Vue.use(Vuex)

const vuexLocal = new VuexPersistence({
  storage: window.localStorage,
  modules: ['transfer', 'payment', 'common']
});

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    bank,
    transfer,
    payment,
    bankOperation,
    common
  },
  plugins: [vuexLocal.plugin]
})
