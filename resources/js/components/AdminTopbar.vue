<template>
    <section class="py-4 px-6 bg-white dark:bg-gray-900 shadow sticky top-0 z-50">
        <nav class="relative">
            <div class="flex items-center">

                <!-- Mobile Toggle icons start -->
                <div class="lg:hidden">
                    <button class="flex items-center" @click="isNavOpen">
                        <icon name="rounded-toggle-bar" />
                    </button>
                </div>
                <!-- Mobile Toggle icons End -->

                <div class="flex items-center mr-auto">
                    <!-- Desktop logo (Visible When the sidebar will collasped) -->
                    <logo v-if="isSidebarCollapsed" class="mr-4" />
                
                    <!-- Breadcrumb  Start -->
                    <div class="hidden lg:block">
                        <breadcrumbs :items="breadcrumbs"></breadcrumbs>
                    </div>
                    <!-- Breadcrumb  End -->
                </div>

                <!--topbar icons(Language switcher dark & light, Notification etc icons) start -->
                <ul class="flex items-center space-x-6 mr-5 xm:mr-6">
                    <locale-dropdown class="text-gray-500 dark:text-gray-300" />
                    <dark-or-light class="dark:bg-gray-800 rounded-full p-1 text-xs shadow hover:text-gray-300" />
                    <li>
                        <a class="text-gray-400 hover:text-gray-300" href="#">
                            <svg class="h-5 w-5" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V14C0 14.7956 0.316071 15.5587 0.87868 16.1213C1.44129 16.6839 2.20435 17 3 17H5.59L8.29 19.71C8.38344 19.8027 8.49426 19.876 8.61609 19.9258C8.73793 19.9755 8.86839 20.0008 9 20C9.23834 20 9.46886 19.9149 9.65 19.76L12.87 17H15C15.7956 17 16.5587 16.6839 17.1213 16.1213C17.6839 15.5587 18 14.7956 18 14V3C18 2.20435 17.6839 1.44129 17.1213 0.87868C16.5587 0.316071 15.7956 0 15 0ZM16 14C16 14.2652 15.8946 14.5196 15.7071 14.7071C15.5196 14.8946 15.2652 15 15 15H12.5C12.2617 15 12.0311 15.0851 11.85 15.24L9.05 17.64L6.71 15.29C6.61656 15.1973 6.50574 15.124 6.38391 15.0742C6.26207 15.0245 6.13161 14.9992 6 15H3C2.73478 15 2.48043 14.8946 2.29289 14.7071C2.10536 14.5196 2 14.2652 2 14V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H15C15.2652 2 15.5196 2.10536 15.7071 2.29289C15.8946 2.48043 16 2.73478 16 3V14Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-400 hover:text-gray-300" href="#">
                            <svg class="h-5 w-5" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 11.18V8C13.9986 6.58312 13.4958 5.21247 12.5806 4.13077C11.6655 3.04908 10.3971 2.32615 9 2.09V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V2.09C5.60294 2.32615 4.33452 3.04908 3.41939 4.13077C2.50425 5.21247 2.00144 6.58312 2 8V11.18C1.41645 11.3863 0.910998 11.7681 0.552938 12.2729C0.194879 12.7778 0.00173951 13.3811 0 14V16C0 16.2652 0.105357 16.5196 0.292893 16.7071C0.48043 16.8946 0.734784 17 1 17H4.14C4.37028 17.8474 4.873 18.5954 5.5706 19.1287C6.26819 19.6621 7.1219 19.951 8 19.951C8.8781 19.951 9.73181 19.6621 10.4294 19.1287C11.127 18.5954 11.6297 17.8474 11.86 17H15C15.2652 17 15.5196 16.8946 15.7071 16.7071C15.8946 16.5196 16 16.2652 16 16V14C15.9983 13.3811 15.8051 12.7778 15.4471 12.2729C15.089 11.7681 14.5835 11.3863 14 11.18ZM4 8C4 6.93913 4.42143 5.92172 5.17157 5.17157C5.92172 4.42143 6.93913 4 8 4C9.06087 4 10.0783 4.42143 10.8284 5.17157C11.5786 5.92172 12 6.93913 12 8V11H4V8ZM8 18C7.65097 17.9979 7.30857 17.9045 7.00683 17.7291C6.70509 17.5536 6.45451 17.3023 6.28 17H9.72C9.54549 17.3023 9.29491 17.5536 8.99317 17.7291C8.69143 17.9045 8.34903 17.9979 8 18ZM14 15H2V14C2 13.7348 2.10536 13.4804 2.29289 13.2929C2.48043 13.1054 2.73478 13 3 13H13C13.2652 13 13.5196 13.1054 13.7071 13.2929C13.8946 13.4804 14 13.7348 14 14V15Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
                <!--topbar icons End -->

                <!-- user-profile dropdown -->
                <div>
                    <base-dropdown tag="div" class="md:relative">
                        <button slot="title" class="flex items-center rounded bg-transparent sm:bg-gray-100 sm:dark:bg-gray-800 px-2 py-1 sm:shadow">
                            <div class="mr-0 sm:mr-3">
                                <img class="w-10 h-10 rounded-full object-cover object-right shadow-xl sm:shadow-none" :src="user.photo_url" :alt="user.name">
                            </div>
                            <div class="mr-2 text-left hidden sm:block">
                                <p class="text-sm font-semibold capitalize text-indigo-500 dark:text-gray-200">{{ user.name }}</p>
                                <p class="text-xs text-gray-800 dark:text-gray-200 hidden lg:block capitalize">{{ user.account_role == 0 ? $t('owner') : user.role[0] }}</p>
                            </div>
                            <span class="hidden sm:block">
                                <icon name="arrow-down" />
                            </span>
                        </button>
                        <template>
                            <div class="text-gray-500 menu w-full md:rounded bg-white dark:bg-gray-900 shadow absolute z-20 right-0 md:w-48 mt-4 py-2 border md:border-gray-100 dark:border-gray-800 animated faster">

                                <!-- item -->
                                <router-link :to="{ name: 'settings.profile' }" class="flex px-4 py-2 block capitalize font-medium text-sm text-gray-500 bg-white dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-500 dark:text-gray-200 group hover:text-indigo-500 transition-all duration-300 ease-in-out">
                                    <icon name="user" classList="text-xs mr-1 group-hover:text-indigo-500 dark:group-hover:text-white mr-2" />
                                    <span>{{ $t('profile') }}</span>
                                </router-link>     
                                <!-- end item -->
                                <!-- item -->
                                <a class="flex px-4 py-2 block capitalize font-medium text-sm text-gray-500 bg-white  dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-500 dark:text-gray-200 group hover:text-indigo-500 transition-all duration-300 ease-in-out" href="#">
                                    <icon name="cog" classList="text-xs mr-1 group-hover:text-indigo-500 dark:group-hover:text-white mr-2" />
                                    <span>{{ $t('settings') }}</span>
                                </a>     
                                <!-- end item -->

                                <hr class="border-gray-100 dark:border-gray-800 mt-2 mb-2">
                                <!-- item -->
                                <a @click.prevent="logout" class="flex px-4 py-2 block capitalize font-medium text-sm text-gray-500 bg-white dark:bg-gray-900 dark:hover:bg-indigo-500 dark:text-gray-200 hover:bg-indigo-100 group hover:text-indigo-500 transition-all duration-300 ease-in-out" href="#">
                                    <icon name="logout" classList="text-xs mr-1 group-hover:text-indigo-500 dark:group-hover:text-white mr-2" />
                                    <span>{{ $t('logout') }}</span>
                                </a>     
                                <!-- end item --> 
                            </div>
                        </template>
                    </base-dropdown>
                </div>
                <!-- user-profile dropdown -->

            </div>
        </nav>
    </section>
</template>

<script>
import { mapGetters } from 'vuex'
import Logo from '~/components/Logo'
import LocaleDropdown from '~/components/LocaleDropdown'
import DarkOrLight from '~/components/DarkOrLight'

export default {
    components: {
        Logo,
        DarkOrLight,
        LocaleDropdown
    },

    data: () => ({
        
    }),

    computed: mapGetters({
        user: 'auth/user',
        isSidebarCollapsed: 'themeConfig/sidebarCollasped',
        breadcrumbs: 'breadcrumbs/breadcrumbs',
    }),



    methods: {
        async logout () {
            // Log out the user.
            await this.$store.dispatch('auth/logout')

            // Redirect to login.
            this.$router.push({ name: 'login' })
        },

        isNavOpen() {
            this.$store.dispatch('themeConfig/isNavOpen');
        }

    }

}
</script>
