<template>
  <section>
    <div class="flex flex-wrap">

        <!-- login left form -->
        <div class="pt-6 lg:pt-0 pb-6 lg:pb-0 w-full lg:w-1/2 dark:bg-gray-900">
          <div class="max-w-lg mx-auto flex h-full justify-center flex-col">

              <div class="mb-6 lg:mb-20 w-full px-3 flex items-center justify-between">
                <logo />
                <router-link :to="{ name: 'register' }" class="py-2 px-6 text-xs rounded-l-xl rounded-t-xl bg-purple-600 hover:bg-purple-700 text-white font-bold transition duration-200">
                  {{ $t('register') }}
                </router-link>
              </div>

              <div>
                <div class="mb-6 px-3">
                    <span class="text-gray-500 dark:text-gray-200">Sign in to</span>
                    <h3 class="text-2xl font-bold dark:text-white" >Access the panel</h3>
                </div>

                <form @submit.prevent="login" @keydown="form.onKeydown($event)">

                    <!-- email -->
                    <div class="mb-3">
                      <div class="flex p-4 mx-2 bg-gray-100 dark:bg-gray-800 rounded " :class="{ 'border border-danger': form.errors.has('email') } ">
                        <input v-model="form.email" class="focus:border-blue-300 w-full text-sm bg-gray-100 dark:bg-gray-800 dark:text-gray-200 focus:outline-none dark:focus:bg-gray-800" type="email" placeholder="name@email.com">
                        <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                      </div>
                      <has-error :form="form" field="email" class="text-danger ml-2 text-sm mt-1" />
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-3">
                      <div class="flex p-4 mx-2 bg-gray-100 dark:bg-gray-800 rounded" :class="{ 'border border-danger': form.errors.has('password') }">
                        <input v-model="form.password" class="w-full text-xs bg-gray-100 dark:bg-gray-800 dark:text-gray-200 outline-none" :type="type"  placeholder="Enter your password">
                        
                        <button type="button" @click="showPassword">

                            <svg v-if="type=='password'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-4 my-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-4 my-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>

                        </button>
                      </div>
                      <has-error :form="form" field="password" class="text-danger ml-2 text-sm mt-1" />
                    </div>

                    <!-- Remember me -->
                    <div class="mb-4 mx-2">
                      <checkbox v-model="remember" name="remember">
                        {{ $t('remember_me') }}
                      </checkbox>
                    </div>

                    <!-- Submit & Others btn -->
                    <div class="mx-2 text-center">
                      <!-- submit btn -->
                      <v-button :loading="form.busy" class="mb-2 w-full py-4 bg-pink-600 hover:bg-pink-700 rounded text-sm font-bold text-gray-50 transition duration-200">
                        {{ $t('login') }}
                      </v-button>
                      
                      <span class="text-gray-400 text-xs">
                        <span>Don't have any account?</span>
                        <router-link :to="{ name: 'register' }" class="text-pink-600 hover:underline">{{ $t('register') }}</router-link>
                      </span>
                      
                      <p class="mt-16 text-xs text-gray-400">
                        <router-link :to="{ name: 'password.request' }" class="hover:text-gray-500">
                          {{ $t('forgot_password') }} ? <span class="underline">Reset</span>
                        </router-link>
                      </p>
                    </div>

                </form>
              </div>
          </div>
        </div>

        
        <!-- login right  form -->
        <div class="hidden lg:block relative w-full lg:w-1/2 bg-purple-600">
          <div class="h-screen mx-auto max-w-xl text-center flex justify-center items-center flex-col">
              <img class="lg:max-w-xl mx-auto" src="/../../../assets/images/pablo-coming-soon-flat-color.png">
              <h2 class="mb-2 text-2xl text-white font-bold">So much more than a business analytics tool</h2>
              <div class="max-w-lg mx-auto">
                <p class="mb-6 text-gray-50 leading-loose">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur nisl sodales egestas lobortis.</p>
              </div>
              <router-link :to="{ name: 'register' }" class="inline-block py-2 px-6 leading-loose rounded-t-xl rounded-l-xl bg-white hover:bg-gray-500 text-gray-900 hover:text-white transition duration-200 font-bold">
                Get Started
              </router-link>
          </div>
        </div>


        <div class="lg:hidden bg-purple-600 w-full">
          <div class="relative w-full">
              <img class="relative mx-auto max-w-sm mt-4 mb-4 block" src="/../../../assets/images/pablo-coming-soon-flat-color.png" alt="">
              <div class="flex justify-center space-x-3">
                <button class="p-1 bg-purple-500 rounded-full"></button>
                <button class="p-1 bg-purple-500 rounded-full"></button>
                <button class="p-1 bg-white rounded-full"></button>
                <button class="p-1 bg-purple-500 rounded-full"></button>
              </div>
          </div>
          <div class="py-10 px-3 text-center">
              <h2 class="mb-2 text-2xl text-white font-bold">So much more than a business analytics tool</h2>
              <p class="mb-6 text-gray-50 leading-loose">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur nisl sodales egestas lobortis.</p>
              <router-link :to="{ name: 'register' }" class="py-2 px-6 rounded-t-xl rounded-l-xl rounded-l-xl bg-white hover:bg-gray-500 text-gray-900 hover:text-white transition duration-200 font-bold">
                Get Started
              </router-link>
          </div>
        </div>
    </div>
  </section>
</template>

<script>
import Form from 'vform'
import Cookies from 'js-cookie'
import Logo from '~/components/Logo'

export default {
  layout: 'basic',
  components: { Logo },

  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    type: 'password',
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  methods: {

    showPassword() {
       if(this.type === 'password') {
          this.type = 'text'
       } else {
          this.type = 'password'
       }
    },

    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.redirect()
    },

    redirect () {
      const intendedUrl = Cookies.get('intended_url')

      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({ path: intendedUrl })
      } else {
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
