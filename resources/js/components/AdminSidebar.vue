<template>
    <aside :class="{ 'collasped': isSidebarCollapsed }">

        <!-- Desktop Sidebar Nav -->
        <div class="lg:block navbar-menu relative z-50" :class="{ 'hidden' : !isMobileNavOpen }">
            <div class="navbar-backdrop fixed lg:hidden inset-0 bg-gray-800 opacity-10"  @click="isNavOpen"></div>
            <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-3/4 sm:max-w-xs transition-height ease-in-out duration-500" :class="[ isSidebarCollapsed ? 'lg:w-20' : 'lg:w-80' ]">
                <div class=" bg-white dark:bg-gray-900 h-full pt-6 pb-8 border-r border-blue-50 dark:border-gray-800">
                    <!-- Logo start -->
                    <div class="flex items-center justify-between w-full px-6 pb-6 mb-6 lg:border-b border-blue-50 dark:border-gray-800  dark:shadow-lg">
                        
                        <logo />

                        <button @click="menuCollasped" class="hidden lg:block flex items-center rounded-full focus:outline-none">
                            <icon name="rounded-toggle-bar" />
                        </button>

                        <button @click="isNavOpen" class="lg:hidden flex items-center rounded-full focus:outline-none">
                            <icon name="x-circle" classList="text-indigo-400 bg-indigo-100 hover:bg-indigo-300 dark:bg-gray-700 dark:hover:bg-gray-800 block h-8 w-8 p-2 rounded-full transition-height ease-in-out duration-500"/>
                        </button>
                    </div>
                    <!-- Logo End -->

                    <!-- Nav item start -->
                    <div class="px-4 pb-6 nav-items h-full">
                        
                        <ul class="mb-8 text-sm font-medium"
                            v-for="(item, i) in menuItems" :key="i">

                            <h3 v-if="!isSidebarCollapsed" class="mb-2 text-xs uppercase text-gray-1000 font-medium">{{ $t(item.header) }}</h3>
                            <Icon v-else name="dot" classList="mb-2 m-auto" />
                            <li v-for="(nav, key) in item.navs" :key="key">
                                <router-link :to="{ name: nav.route }"  class="block text-gray-500 dark:text-gray-1000 rounded group" v-if="$can(nav.permission)">
                                    <div class="flex flex items-center pl-3.5 p-3 group-hover:translate-x-1" 
                                        :content="nav.title" 
                                        v-tippy='{ onShow: () => isSidebarCollapsed, placement : "right", arrow:true }'
                                    >
                                        <Icon :name="nav.icon" classList="text-gray-400 group-hover:text-indigo-500 transition-height ease-in-out duration-500" />
                                        <span class="ml-3 overflow-hidden group-hover:text-indigo-500 transition-height ease-in-out duration-500">{{ $t(nav.title) }}</span>
                                    </div>
                                </router-link>
                            </li>
                            
                        </ul>

                    </div>
                    <!-- Nav item End -->
                </div>
            </nav>
        </div>
        
    </aside>
</template>


<script>
import { mapGetters } from 'vuex'
import Logo from '~/components/Logo'

export default {
    components: {
        Logo
    },

    data: () => ({
        menuItems:[
            {
                header:'main',
                navs:[
                    {
                        title: 'dashboard',
                        route: 'home',
                        icon: 'dashboard',
                        permission: 'dashboard-view'
                    }
                ]
            },

            {
                header:'setup',
                navs:[
                    {
                        title: 'settings',
                        route: 'settings.index',
                        icon: 'cog',
                        permission: 'settings-view'
                    }
                ]
            }
        ]
    }),


    computed: mapGetters({
        isSidebarCollapsed: 'themeConfig/sidebarCollasped',
        isMobileNavOpen: 'themeConfig/mobileNavOpen',
    }),


    methods: {
        menuCollasped() {
            this.$store.dispatch('themeConfig/sidebarCollasped');
        },

        isNavOpen() {
            this.$store.dispatch('themeConfig/isNavOpen');
        }
    }

}
</script>
