import axios from 'axios'
import * as types from '../mutation-types'

// STATE
export const state = {
  loading:true,
  teams: null,
  allUsers: null
}

// GETTERS
export const getters = {
  loading: state => state.loading,
  teams: state => state.teams ? state.teams.data : '',
  pagination: state => state.teams ? state.teams.meta : {current_page:1},
  allUsers: state => state.allUsers ? state.allUsers : ''
}

// mutations
export const mutations = {

  //get all users
  [types.FETCH_TEAMS] (state, { teams, loading }) {
    state.teams = teams
    state.loading = loading
  },

  //get all team members for assign in service
  [types.FETCH_ALL_TEAMS] (state, { teams }) {
    state.allUsers = teams
  },


  // delete
  [types.DELETE_TEAM] (state, { slug }) {
    state.teams.data = state.teams.data.filter(data => data.slug != slug)
  },

  // delete teams
  [types.DELETE_SELECTED_TEAM] (state, teamSlug) {
    state.teams.data = state.teams.data.filter(team => !teamSlug.data.includes(team.slug));
  }

}

// actions
export const actions = {

  // Fetch Team
  async fetchTeam ({ commit } ,current_page) {
    const { data } = await axios.get(window.location.origin+'/api/team?page='+current_page)
    commit(types.FETCH_TEAMS, { teams: data, loading:false })
  },


  // Fetch all Team
  async fetchAllUser ({ commit }) {
    const { data } = await axios.get(window.location.origin+'/api/team')
    commit(types.FETCH_ALL_TEAMS, { teams: data });
  },

  // Fetch Search Data
  async fetchSearchData({ commit }, {query, current_page}) {
    const { data } = await axios.get(window.location.origin+'/api/team-search/'+query+'?page='+current_page)
    commit(types.FETCH_TEAMS, { teams: data })
  },


  // Delete user
  async deleteTeam({ commit }, slug) {
    try {
      const {data} = await axios.delete(window.location.origin+'/api/team/'+slug)
      commit(types.DELETE_TEAM, { slug: slug })
      return data.success;
    } catch (error) {
      return error;
    }
  },


  // Delete multiple users
  async deleteSelectedTeams({ commit }, teamSlugs) {
    try {
      let {data} =await axios.post('/api/team/delete-selected', { data: teamSlugs })
      commit(types.DELETE_SELECTED_TEAM, { data: teamSlugs })
      return data.success;
    } catch (error) {
      return error;
    }
  }

}
