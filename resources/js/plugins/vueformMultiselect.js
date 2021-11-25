import Vue from 'vue'
import VueCompositionAPI from '@vue/composition-api'
import Multiselect from '@vueform/multiselect/dist/multiselect.vue2.js'
Vue.use(VueCompositionAPI)
Vue.component("multi-select", Multiselect);