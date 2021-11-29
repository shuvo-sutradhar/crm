function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  // { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/', name: 'login', component: page('auth/login.vue') },
  // { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },
  { 
    path: '/home', 
    name: 'home', 
    component: page('home.vue'),
    meta: { permissions:['dashboard'] }  
  },

  //  My desk route
  { 
    path: '/my-desk', 
    name: 'my-desk.index', 
    component: page('myDesk/index.vue'),
    meta: { permissions:['my-desk'] }   
  },
  { 
    path: '/attandance', 
    name: 'attandance.index', 
    component: page('attandance/index.vue'),
    meta: { permissions:['attandance'] }  
  },

  //  Department route
  { 
    path: '/settings/department', 
    name: 'department.index', 
    component: page('settings/department/index.vue'),
    meta: { permissions:['settings'] } 
  },
  //  Designation route
  { 
    path: '/settings/designation', 
    name: 'designation.index', 
    component: page('settings/designation/index.vue'),
    meta: { permissions:['settings'] } 
  },
  //  Designation route
  { 
    path: '/settings/leave-settings', 
    name: 'leave-settings.index', 
    component: page('settings/leave-settings/index.vue'),
    meta: { permissions:['settings'] } 
  },


  //settings Route
  { 
    path: '/settings', 
    name: 'settings.index', 
    component: page('settings/index.vue'),
    meta: { permissions:['settings'] } 
  },
  { 
    path: '/settings/team', 
    name: 'team.index', 
    component: page('settings/team/index.vue'),
    meta: { permissions:['settings'] } 
  },
  { 
    path: '/settings/team/create', 
    name: 'team.create', 
    component: page('settings/team/create.vue'),
    meta: { permissions:['settings'] } 
  },
  { 
    path: '/settings/team/edit/:slug', 
    name: 'team.edit', 
    component: page('settings/team/edit.vue'),
    meta: { permissions:['settings'] }
  },

  //Role & Permission Route
  { 
    path: '/settings/role', 
    name: 'role.index', 
    component: page('settings/role/index.vue'),
    meta: { permissions:['settings'] }
  },
  { 
    path: '/settings/role/create', 
    name: 'role.create', 
    component: page('settings/role/create.vue'),
    meta: { permissions:['settings'] }
  },
  { 
    path: '/settings/role/:slug', 
    name: 'role.edit', 
    component: page('settings/role/edit.vue'),
    meta: { permissions:['settings'] }
  },

  // tag route
  { 
    path: '/settings/tag', 
    name: 'tag', 
    component: page('settings/tag/index.vue'),
    meta: { permissions:['settings'] }
  },

  // activity log
  { 
    path: '/settings/log', 
    name: 'activity-log', 
    component: page('settings/activity-log/index.vue'),
    meta: { permissions:['settings'] }
  },

  // profile settings
  { path: '/settings/profile', name: 'settings.profile', component: page('settings/profile.vue') },
  { path: '/settings/password', name: 'settings.password', component: page('settings/password.vue') },


  { path: '*', component: page('errors/404.vue') }
]
