import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth.js'
import noti from './modules/noti.js'

Vue.use(Vuex)

export const store = new Vuex.Store({
  
  modules: {
    auth:auth,
    noti:noti,
   }
})
