<template>
    <div class="container mx-auto max-w-6xl">

        <!-- page-heading-start -->
        <div class="flex justify-between items-center w-full mb-4">
          <div>
            <h1 class="page-heading">{{ $t('team_create') }}</h1>
          </div>
          <router-link :to="{ name: 'team.index' }" class="button-primary bg-white text-gray-900 dark:bg-gray-900 dark:text-white">
              <icon name="back" classList="text-gray-900 dark:text-white" />
              <span class="ml-1">{{ $t('go_back') }}</span>
          </router-link>
        </div>
        <!-- page-heading-End -->

        <!-- Form-area-start -->
        <div>
          <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
              <div class="bg-white dark:bg-gray-900 rounded p-4 md:p-10 shadow">
                <div class="grid grid-cols-6 gap-6">

                  <!-- Name input -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="name" class="input-label">{{ $t('name') }} </label>
                    <input type="text" placeholder="Jon doe" name="name" id="name" class="input-field" 
                           :class="{ 'border border-red-500': form.errors.has('name') }"
                           v-model="form.name">
                    <has-error :form="form" field="name" class="text-red-500" />
                  </div>

                  <!-- Email input -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="email" class="input-label">{{ $t('email') }}</label>
                    <input type="email" name="email" id="email" placeholder="jon@gmail.com" class="input-field"
                           :class="{ 'border border-red-500': form.errors.has('email') }"
                           v-model="form.email">
                    <has-error :form="form" field="email" class="text-red-500" />
                  </div>

                  <!-- Phone input -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="phone" class="input-label">{{ $t('phone') }} </label>
                    <input type="text" name="phone" id="phone" placeholder="(999) 999-9999" class="input-field"
                           :class="{ 'border border-red-500': form.errors.has('phone') }"
                           v-model="form.phone">
                    <has-error :form="form" field="phone" class="text-red-500" />
                  </div>

                  <!-- Role Select -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="role" class="input-label">{{ $t('role') }}</label>
                    <multi-select class="mt-1 py-3 shadow-sm text-gray-600 text-sm dark:text-gray-200 bg-white dark:bg-gray-700 focus:outline-none focus:border-indigo-500 dark:border-gray-700"
                        :class="{ 'border border-red-500': form.errors.has('role') }"
                        id="role"
                        :placeholder="$t('assign_a_role')"
                        v-model="form.role"
                        :searchable="true"
                        label="name"
                        trackBy="slug"
                        :options="roles.map(o => Object.assign({},o,{value:o.slug}))"
                      />
                    <has-error :form="form" field="role" class="text-red-500" />
                  </div>

                  <!-- Password input -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="password" class="input-label">{{ $t('password') }} </label>
                    <input type="password" name="password" id="password" placeholder="**********" class="input-field"
                           :class="{ 'border border-red-500': form.errors.has('password') }"
                           v-model="form.password">
                    <small class="text-xs text-gray-500">{{ $t('default_password') }}: 12345678</small>
                    <has-error :form="form" field="password" class="text-danger text-sm" />
                  </div>

                  <!-- Confirm Password input -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="confirm_password" class="input-label">{{ $t('confirm_password') }} </label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="**********" class="input-field"
                           :class="{ 'border border-red-500': form.errors.has('password_confirmation') }"
                           v-model="form.password_confirmation">
                    <has-error :form="form" field="password_confirmation" class="text-danger text-sm" />
                  </div>

                  <!-- Profile -->
                  <div class="col-span-6 sm:col-span-3">
                    <label for="profile_photo" class="input-label block">{{ $t('profile_pic') }}</label> 
                    <img class="rounded-full w-16 h-16 border-4 mt-2 border-gray-200 dark:border-gray-700 float-left" 
                          :src="form.profile_photo ? getProfilePhoto() : 'https://www.gravatar.com/avatar/faf1084144ec566e51fadd3420c66c02?s=100&amp;d=mm&amp;r=g'" 
                          alt="photo">
                    <div class="bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-300 text-xs mt-5 ml-3 font-bold px-4 py-2 rounded-lg float-left hover:bg-gray-300 hover:text-gray-600 relative overflow-hidden cursor-pointer">
                        <input type="file" name="profile_photo" @change="uploadPhoto" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" :class="{ 'is-invalid': form.errors.has('profile_phototure') }"> {{ $t('change') }}
                    </div>
                    <has-error :form="form" field="profile_photo"></has-error>
                  </div>

                  <!-- Send Mail If Checked -->
                  <div class="col-span-6">
                      <checkbox v-model="form.mail" name="mail">
                        <span class="text-gray-700 dark:text-gray-200 font-medium capitalize mt-1 inline-block">{{ $t('send_mail') }}</span>
                      </checkbox>
                  </div>

                </div>
              </div>
              <v-button :loading="form.busy" class="button-primary mt-5 flex ml-auto">
                  <span class="mr-2">{{ $t('save')  }}</span>
                  <icon name="save" />
              </v-button>
          </form>
        </div>
        <!-- Form-area-End -->


    </div>
</template>


<script>

import axios from 'axios'
import Form from 'vform'
export default {
  layout: 'dashboard',
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('team') }
  },

  data: () => ({
    breadcrumbs:[
        {
          name:'settings',
          url: 'settings.index'
        },
        {
            name: 'team',
            url: 'team.index'
        },
        {
            name: 'team_create'
        }
    ],

    roles: [],
    form: new Form({
        name:'',
        email:'',
        phone:'',
        role:{},
        password: '',
        password_confirmation: '',
        profile_photo:'',
        mail:true,
    })

  }),


  created() {
    this.getRole();
    this.breadcrumbsStore();
  },

  methods: {

      // BREADCRUMBS
      breadcrumbsStore() {
          this.$store.dispatch('breadcrumbs/breadCrumbs', this.breadcrumbs);
      },

      // GET ROLES
      async getRole() {
        const { data } = await axios.get(window.location.origin+'/api/role');
        this.roles = data;
      },

      // GET PROFILE PHOTO
      getProfilePhoto(){
            let prefix = (this.form.profile_photo.match(/\//) ? '' : '');
            return prefix + this.form.profile_photo;
      },


      // GET UPLOAD PHOTO
      async uploadPhoto(e) {
          let file = e.target.files[0];
          let reader = new FileReader();
          //check file type
          if((file['type'] == 'image/jpeg') || (file['type'] == 'image/png')) {

              //check file size
              if(file['size'] < 5242880) {
                  reader.onloadend = (file) => {
                      this.form.profile_photo = reader.result;
                  }
                  reader.readAsDataURL(file)
              } else {
                  Swal.fire({
                      title: this.$t('error_alert_title'),
                      text: this.$t('large_file_size'),
                      icon: 'error',
                  })
              }
          } else {
              Swal.fire({
                  title: this.$t('error_alert_title'),
                  text: this.$t('only_allowed_img'),
                  icon: 'error',
              })
          }
      },

      // SUBMIT
      async submit() {
          await this.form.post('/api/team').then((response)=>{
            toast.fire({icon: 'success',title: this.$t('new_user_added')})
            this.$router.push({ name: 'team.index'});
          }).catch(()=>{
                toast.fire({icon: 'error', title: this.$t('opps') + this.$t('something_is_wrong') + ' 😔'})
          })
      },

  }
}
</script>

<style>

.multiselect-option.is-selected.is-pointed,
.multiselect-option.is-selected {
    background: #6366f12b !important;
    color: #6366f1 !important;
}

.multiselect.is-active {
    box-shadow: none !important;
    border: 1px solid #7367f0;
    box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%);
}


.dark .multiselect-search {
    background: #1f2937;
    border: 0px solid #374151;
}

.dark .multiselect-dropdown{
    background: #1F2937 !important;
    border: 1px solid #374151;
}

.dark .multiselect-option.is-pointed {
    background: #111827;
    color: #ffffff;
}

</style>