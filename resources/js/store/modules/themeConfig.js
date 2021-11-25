
import * as types from '../mutation-types'

// state
export const state = {
    sidebarCollasped: false,
    mobileNavOpen: false,
    dark: false
}


// getters
export const getters = {
    sidebarCollasped: state => state.sidebarCollasped,
    mobileNavOpen: state => state.mobileNavOpen,
    dark: state => state.dark,
}


// mutations
export const mutations = {

    [types.SIDEBAR_COLLASPED] (state) {
      state.sidebarCollasped = !state.sidebarCollasped
    },

    [types.MOBILE_NAV_COLLASPED] (state) {
      state.mobileNavOpen = !state.mobileNavOpen
    },

    [types.DARK_MODE] (state,  data ) {
        state.dark = data
    },
}
  
// actions
export const actions = {
    /**
     *  SIDEBAR COLLASPED
    */
    sidebarCollasped ({ commit }) {
        commit(types.SIDEBAR_COLLASPED)
    },


    /**
     *  MOBILE NAV COLLASPED
    */
     isNavOpen ({ commit }) {
        commit(types.MOBILE_NAV_COLLASPED)
    },


    /**
     *  DARK OR LIGHT
    */
    darkMode({ commit }, payload) {
        commit(types.DARK_MODE, payload);
    }
}
