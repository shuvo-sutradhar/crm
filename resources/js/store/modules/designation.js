import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  loading:true,
  designations: null
}

// getters
export const getters = {
  loading: state => state.loading,
  designations: state => state.designations ? state.designations.data : '',
  pagination: state => state.designations ? state.designations.meta : {current_page:1},
}

// mutations
export const mutations = {

  //get all team members
  [types.FETCH_DESIGNATION] (state, { designations, loading }) {
    state.designations = designations
    state.loading = loading
  },


  //get all team members
  [types.UPDATE_DESIGNATION] (state,  {data} ) {
     Object.assign(state.designations.data.find(designation => designation.slug === data.slug), data);
  },

  // delete
  [types.DELETE_DESIGNATION] (state, { slug }) {
    state.designations.data = state.designations.data.filter(data => data.slug != slug)
  }

}

// actions
export const actions = {

  // Fetch Team
  async fetchDesignation ({ commit } ,current_page) {
    const { data } = await axios.get(window.location.origin+'/api/designation?page='+current_page)
    commit(types.FETCH_DESIGNATION, { designations: data, loading:false })
  },

  // Fetch Search Data
  async fetchSearchData({ commit }, {query, current_page}) {
    const { data } = await axios.get(window.location.origin+'/api/designation-search/'+query+'?page='+current_page)
    commit(types.FETCH_DESIGNATION, { designations: data })
  },

  // tagUpdate
  async deptUpdate({ commit }, payload) {
    commit(types.UPDATE_DESIGNATION, payload)
  },

  // Delete user
  async deleteDesignation({ commit }, slug) {
    try {
      const {data} = await axios.delete(window.location.origin+'/api/designation/'+slug)
      commit(types.DELETE_DESIGNATION, { slug: slug })
      return data.success;
    } catch (error) {
      return error;
    }
  }
  

}
