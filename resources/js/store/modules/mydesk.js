import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  loading:true,
  attandances: null,
  todaysAttandance: null,
}

// getters
export const getters = {
  loading: state => state.loading,
  todaysAttandance: state => state.todaysAttandance ? state.todaysAttandance : '',
  attandances: state => state.attandances ? state.attandances.data : '',
  pagination: state => state.attandances ? state.attandances.meta : {current_page:1}
}

// mutations
export const mutations = {

  //get all team members
  [types.FETCH_ATTANDANCE] (state, { attandances, loading }) {
    state.attandances = attandances
    state.loading = loading
  },

  //get all team members
  [types.FETCH_TODAYS_ATTANDANCE] (state, { todaysAttandance }) {
    state.todaysAttandance = todaysAttandance
  },



}

// actions
export const actions = {

  // Fetch Team
  async fetchAttandacne ({ commit } ,current_page) {
    const { data } = await axios.get(window.location.origin+'/api/my-attandance?page='+current_page)
    commit(types.FETCH_ATTANDANCE, { attandances: data, loading:false })
  },

  // Fetch Search Data
  async fetchTodaysAttandance({ commit }) {
    const { data } = await axios.get(window.location.origin+'/api/todays-attandance')
    commit(types.FETCH_TODAYS_ATTANDANCE, { todaysAttandance: data })
  },

  // Fetch Search Data
  async fetchSearchData({ commit }, { data, pagination }) {

    axios.get(window.location.origin+'/api/my-attandance-filter/' + JSON.stringify(data) + '?page='+pagination)
    .then((res) => {
      commit(types.FETCH_ATTANDANCE, { attandances: res.data, loading:false });
    })

  },
  

}
