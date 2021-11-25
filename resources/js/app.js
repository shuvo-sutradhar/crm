import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import can from '~/helpers/can'
import i18n from '~/plugins/i18n'
import App from '~/components/App'


import '~/plugins'
import '~/components'

Vue.config.productionTip = false
Vue.prototype.$can = can;

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
