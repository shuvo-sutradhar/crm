<template>
  <div class="antialiased font-body bg-body dark:bg-gray-800 text-body min-h-screen">
    <!-- Dashboard Sidebar (LEFT) -->
    <admin-sidebar />

    <!-- Dashboard Content (Right) -->
    <div class="mx-auto transition-height ease-in-out duration-500 " :class="[ isSidebarCollapsed ? 'lg:ml-20' : 'lg:ml-80' ]">


      <!-- Dashboard topbar -->
      <admin-topbar /> 

      <!-- Dashboard Inner Content -->
      <div class="p-8 content-height">
        <child />
      </div>


      <!-- footer -->
      <footer class="flex justify-between items-center bg-white dark:bg-gray-900 p-4 shadow text-xs text-gray-500">
        <div>COPYRIGHT &copy; {{new Date().getFullYear()}} Codeshaper </div>
        <div class="flex items-center">Hand-crafted & Made with <icon name="love" /></div>
      </footer>
    </div>
  </div>
</template>

<script>

import { mapGetters } from 'vuex'
import AdminSidebar from '~/components/AdminSidebar'
import AdminTopbar from '~/components/AdminTopbar'

export default {
  name: 'MainLayout',

  components: {
    AdminSidebar, AdminTopbar
  },

  computed: mapGetters({
      isSidebarCollapsed: 'themeConfig/sidebarCollasped'
  }),

}
</script>
