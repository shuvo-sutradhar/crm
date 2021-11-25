<template>

    <div class="relative container px-4 mx-auto">
      <nav class="relative flex justify-between items-center py-6 z-10">
          <!-- logo start -->
          <logo />
          <!-- logo end-->

          <div class="lg:hidden">
            <button class="navbar-burger flex items-center py-3 px-4 bg-brand-blue hover:bg-blue-700 text-white rounded-3xl focus:outline-none">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>Mobile menu</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
          </div>
          
          <ul class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 hidden lg:flex lg:items-center lg:w-auto lg:space-x-12">
            <locale-dropdown />
            <li>
                <div class="relative dropdown">
                  <a class="dropdown-toggle inline-flex items-center justify-center w-full text-sm text-blueGray-600 hover:text-blueGray-800" href="#">
                      <span>Products</span>
                      <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                  </a>
                  <div class="dropdown-menu origin-top-right absolute left-1/2 transform -translate-x-1/2 mt-3 w-80 md:w-96 rounded-lg shadow bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 hidden">
                      <div class="px-3 py-4">
                        <div class="absolute w-3 h-3 -mt-5 border transform rotate-45 left-1/2 -translate-x-1/2 bg-white"></div>
                        <div class="absolute w-5 h-4 -mt-4 transform left-1/2 -translate-x-1/2 bg-white"></div>
                        <ul>
                            <li>
                              <a class="p-2 flex items-center hover:bg-brand-section-light rounded" href="/tailwind">
                                  <div class="flex items-center justify-center w-12 h-12 mr-4 rounded bg-menu-tailwind"><img class="h-6 w-6" src="/../../../assets/images/tailwind-css.svg" alt=""></div>
                                  <div class="inline-block">
                                    <p class="mb-1 text-sm font-semibold">Tailwind Editor</p>
                                    <p class="text-xs text-blueGray-500">An online editor for Tailwind CSS</p>
                                  </div>
                              </a>
                            </li>
                            <li>
                              <a class="p-2 flex items-center hover:bg-brand-section-light rounded" href="/bootstrap">
                                  <div class="flex items-center justify-center w-12 h-12 mr-4 rounded bg-menu-bootstrap"><img class="h-5" src="/../../../assets/images/bootstrap-logo.svg" alt=""></div>
                                  <div class="inline-block">
                                    <p class="mb-1 text-sm font-semibold">Bootstrap Editor</p>
                                    <p class="text-xs text-blueGray-500">An online editor for Bootstrap 5</p>
                                  </div>
                              </a>
                            </li>
                            <li>
                              <a class="p-2 flex items-center hover:bg-brand-section-light rounded" href="/material-ui">
                                  <div class="flex items-center justify-center w-12 h-12 mr-4 rounded bg-menu-material-ui"><img class="h-5 w-auto" src="/../../../assets/images/material-ui.svg" alt=""></div>
                                  <div class="inline-block">
                                    <p class="mb-1 text-sm font-semibold">Material-UI Editor</p>
                                    <p class="text-xs text-blueGray-500">An online editor for Material-UI</p>
                                  </div>
                              </a>
                            </li>
                            <li>
                              <a class="p-2 flex items-center hover:bg-brand-section-light rounded" href="/bulma">
                                  <div class="flex items-center justify-center w-12 h-12 mr-4 rounded bg-menu-bulma"><img class="h-6 w-auto" src="/../../../assets/images/bulma.svg" alt=""></div>
                                  <div class="inline-block">
                                    <p class="mb-1 text-sm font-semibold">Bulma Editor</p>
                                    <p class="text-xs text-blueGray-500">An online editor for Bulma CSS</p>
                                  </div>
                              </a>
                            </li>
                            <li>
                              <a class="p-2 flex items-center hover:bg-brand-section-light rounded" href="/visual-studio-code">
                                  <div class="flex items-center justify-center w-12 h-12 mr-4 rounded bg-menu-material-ui"><img class="h-6 w-auto" src="/vendor/shuffle/img/logos/visual-studio-logo.svg?v=1" alt=""></div>
                                  <div class="inline-block">
                                    <p class="mb-1 text-sm font-semibold">Extension for Visual Studio Code</p>
                                    <p class="text-xs text-blueGray-500">Improve the project in your favorite IDE</p>
                                  </div>
                              </a>
                            </li>
                        </ul>
                      </div>
                  </div>
                </div>
            </li>
            <li>
                <div class="relative dropdown">
                  <a class="dropdown-toggle inline-flex items-center justify-center w-full text-sm text-blueGray-600 hover:text-blueGray-800" href="/marketplace">
                      <span>UI libraries</span>
                      <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                  </a>
                  <div class="hidden dropdown-menu origin-top-right absolute left-1/2 transform -translate-x-1/2 mt-3 w-80 md:w-libraries-popular rounded-lg shadow bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">
                      <div class="px-4 py-4">
                        <div class="absolute w-3 h-3 -mt-5 border transform rotate-45 left-1/2 -translate-x-1/2 bg-white"></div>
                        <div class="absolute w-5 h-4 -mt-4 transform left-1/2 -translate-x-1/2 bg-white"></div>
                        <div class="bg-brand-section-light rounded p-4 mb-4">
                            <a class="text-sm text-secondary hover:text-gray-800 font-semibold flex items-center" href="/marketplace">
                            <img class="h-5 mr-2" src="/vendor/shuffle/img/icons/books.svg" alt="">
                            <span>Browse <span class="text-brand-blue">24</span> UI libraries</span>
                            <img class="h-4" src="/vendor/shuffle/img/icons/double-chevron.svg" alt="">
                            </a>
                        </div>
                        <div class="bg-brand-section-light rounded p-4 mb-4">
                            <a class="text-sm text-secondary hover:text-gray-800 font-semibold flex items-center" href="/components">
                            <img class="h-6 mr-2" src="/vendor/shuffle/img/icons/layer-group.svg" alt="">
                            <span>Browse <span class="text-brand-blue">3,200+</span> UI components</span>
                            <img class="h-4" src="/vendor/shuffle/img/icons/double-chevron.svg" alt="">
                            </a>
                        </div>
                        <div class="mb-1">
                            <h4 class="text-secondary text-xs uppercase mb-2">MOST POPULAR</h4>
                            <div class="flex flex-wrap -mx-4">
                              <div class="w-1/2 px-4 mb-4">
                                  <a class="flex items-center group" href="/marketplace/tailwind-ecommerce">
                                    <img class="h-20 rounded mr-4 border-2 border-transparent group-hover:border-brand-blue" src="https://static.shuffle.dev/files/1630224537/yofte-library.png" alt="">
                                    <div>
                                        <h5 class="mb-0 text-sm text-body font-semibold leading-tight flex items-center">
                                          Yofte 
                                          <img class="h-4 ml-1 hidden group-hover:inline-block" src="/vendor/shuffle/img/icons/double-chevron.svg" alt="">
                                        </h5>
                                        <span class="text-secondary text-xs">E-commerce</span>
                                    </div>
                                  </a>
                              </div>
                              <div class="w-1/2 px-4 mb-4">
                                  <a class="flex items-center group" href="/marketplace/zospace">
                                    <img class="h-20 rounded mr-4 border-2 border-transparent group-hover:border-brand-blue" src="https://static.shuffle.dev/files/1621854632/zospace-thumbnail.png" alt="">
                                    <div>
                                        <h5 class="mb-0 text-sm text-body font-semibold leading-tight flex items-center">
                                          Zospace 
                                          <img class="h-4 ml-1 hidden group-hover:inline-block" src="/vendor/shuffle/img/icons/double-chevron.svg" alt="">
                                        </h5>
                                        <span class="text-secondary text-xs">Landing</span>
                                    </div>
                                  </a>
                              </div>
                              <div class="w-1/2 px-4">
                                  <a class="flex items-center group" href="/marketplace/bendis">
                                    <img class="h-20 rounded mr-4 border-2 border-transparent group-hover:border-brand-blue" src="https://static.shuffle.dev/files/1618824361/bendis-landing.png" alt="">
                                    <div>
                                        <h5 class="mb-0 text-sm text-body font-semibold leading-tight flex items-center">
                                          Bendis 
                                          <img class="h-4 ml-1 hidden group-hover:inline-block" src="/vendor/shuffle/img/icons/double-chevron.svg" alt="">
                                        </h5>
                                        <span class="text-secondary text-xs">Landing</span>
                                    </div>
                                  </a>
                              </div>
                              <div class="w-1/2 px-4">
                                  <a class="flex items-center group" href="/marketplace/artemis">
                                    <img class="h-20 rounded mr-4 border-2 border-transparent group-hover:border-brand-blue" src="https://static.shuffle.dev/files/1619789012/artemis.png" alt="">
                                    <div>
                                        <h5 class="mb-0 text-sm text-body font-semibold leading-tight flex items-center">
                                          Artemis 
                                          <img class="h-4 ml-1 hidden group-hover:inline-block" src="/vendor/shuffle/img/icons/double-chevron.svg" alt="">
                                        </h5>
                                        <span class="text-secondary text-xs">Dashboard</span>
                                    </div>
                                  </a>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </li>
            <li><a class="text-sm text-blueGray-600 hover:text-blueGray-800" href="/#how-it-works" data-section="how-it-works">How it works</a></li>
            <li><a class="text-sm text-blueGray-600 hover:text-blueGray-800" href="/#purchase" data-section="purchase">Purchase</a></li>
          </ul>
          <div class="load-animation reveal-fast hidden lg:block">
              <!-- Authenticated -->
              <li v-if="user" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark"
                  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                >
                  <img :src="user.photo_url" class="rounded-circle profile-photo me-1">
                  {{ user.name }}
                </a>
                <div class="dropdown-menu">
                  <router-link :to="{ name: 'settings.profile' }" class="dropdown-item ps-3">
                    <fa icon="cog" fixed-width />
                    {{ $t('settings') }}
                  </router-link>

                  <div class="dropdown-divider" />
                  <a href="#" class="dropdown-item ps-3" @click.prevent="logout">
                    <fa icon="sign-out-alt" fixed-width />
                    {{ $t('logout') }}
                  </a>
                </div>
              </li>
              <!-- Guest -->
              <template v-else>
                  <router-link :to="{ name: 'login' }" class="mr-2 inline-block px-4 py-3 text-xs font-semibold leading-none bg-white hover:bg-blueGray-800 hover:text-white rounded-4xl shadow-button transition duration-100">
                    {{ $t('login') }}
                  </router-link>
                  <router-link :to="{ name: 'register' }" class="inline-block px-4 py-3 text-xs font-semibold leading-none bg-brand-indigo-light hover:bg-indigo-300 text-brand-indigo-dark rounded-4xl transition duration-100">
                    {{ $t('register') }}
                  </router-link>
              </template>
              <!-- <locale-dropdown class="" /> -->
          </div>
      </nav>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from '~/components/LocaleDropdown'
import Logo from '~/components/Logo'

export default {
  components: {
    LocaleDropdown, Logo,
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}

.container {
  max-width: 1100px;
}
</style>
