import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  loading:true,
  attandances: null,
}

// getters
export const getters = {
  loading: state => state.loading,
  attandances: state => state.attandances ? state.attandances.data : '',
  pagination: state => state.attandances ? state.attandances.meta : {current_page:1},
}

// mutations
export const mutations = {

  //get all team members
  [types.FETCH_ALL_ATTANDANCE] (state, { attandances, loading }) {
    state.attandances = attandances
    state.loading = loading
  }


}

// actions
export const actions = {

  // Fetch Team
  async fetchAttandacne ({ commit } ,current_page) {
    const { data } = await axios.get(window.location.origin+'/api/attandance?page='+current_page)
    commit(types.FETCH_ALL_ATTANDANCE, { attandances: data, loading:false })
  },



}
