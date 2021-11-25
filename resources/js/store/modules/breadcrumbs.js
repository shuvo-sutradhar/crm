
import * as types from '../mutation-types'

// state
export const state = {
  breadcrumbs: []
}


// getters
export const getters = {
    breadcrumbs: state => state.breadcrumbs
}


// mutations
export const mutations = {

    [types.BREADCRUMBS] (state, { data }) {
      state.breadcrumbs = data
    },


}
  
// actions
export const actions = {
    /**
     *  SIDEBAR COLLASPED
    */
    breadCrumbs ({ commit }, data) {
        commit(types.BREADCRUMBS, {data:data})
    },

}
