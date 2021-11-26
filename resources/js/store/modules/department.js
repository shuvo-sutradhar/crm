import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  loading:true,
  departments: null
}

// getters
export const getters = {
  loading: state => state.loading,
  departments: state => state.departments ? state.departments.data : '',
  pagination: state => state.departments ? state.departments.meta : {current_page:1},
}

// mutations
export const mutations = {

  //get all team members
  [types.FETCH_DEPARTMENT] (state, { departments, loading }) {
    state.departments = departments
    state.loading = loading
  },


  //get all team members
  [types.UPDATE_DEPARTMENT] (state,  {data} ) {
     Object.assign(state.departments.data.find(department => department.slug === data.slug), data);
  },

  // delete
  [types.DELETE_DEPARTMENT] (state, { slug }) {
    state.departments.data = state.departments.data.filter(data => data.slug != slug)
  }
  
}

// actions
export const actions = {

  // Fetch Team
  async fetchDept ({ commit } ,current_page) {
    const { data } = await axios.get(window.location.origin+'/api/department?page='+current_page)
    commit(types.FETCH_DEPARTMENT, { departments: data, loading:false })
  },

  // Fetch Search Data
  async fetchSearchData({ commit }, {query, current_page}) {
    const { data } = await axios.get(window.location.origin+'/api/department-search/'+query+'?page='+current_page)
    commit(types.FETCH_DEPARTMENT, { departments: data })
  },

  // tagUpdate
  async deptUpdate({ commit }, payload) {
    commit(types.UPDATE_DEPARTMENT, payload)
  },

  // Delete user
  async deleteDept({ commit }, slug) {
    try {
      const {data} = await axios.delete(window.location.origin+'/api/department/'+slug)
      commit(types.DELETE_DEPARTMENT, { slug: slug })
      return data.success;
    } catch (error) {
      return error;
    }
  }

}
