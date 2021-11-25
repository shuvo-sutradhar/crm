<template>
    <div class="container mx-auto max-w-3xl">

        <!-- page-heading-start -->
        <div class="flex justify-between items-center w-full mb-4">
            <h1 class="page-heading">{{ $t('role_create') }}</h1>

            <router-link :to="{ name: 'role.index' }" class="button-primary bg-white text-gray-900 dark:bg-gray-900 dark:text-white">
                <icon name="back" classList="text-gray-900 dark:text-white" />
                <span class="ml-1">{{ $t('go_back') }}</span>
            </router-link>
        </div>
        <!-- page-heading-End -->


        <!-- page content start -->
        <form @submit.prevent="save" @keydown="form.onKeydown($event)">
            <div class="w-full mx-auto mt-4 overflow-hidden">
                <div class="py-4 px-8 md:py-8 md:px-16 lg:py-8 lg:px-16 bg-white dark:bg-gray-900 rounded rounded-b-none">
                    <label for="name" class="input-label">{{ $t('name') }} </label>
                    <input id="name"  
                           class="input-field" 
                           type="text" 
                           :class="{ 'border border-red-500': form.errors.has('name') }"
                           v-model="form.name">
                    <has-error :form="form" field="name" class="text-red-500" />
                </div>
                <hr class="border-gray-100 dark:border-gray-800">
                
                <div class="py-4 px-8 md:py-8 md:px-16 lg:py-8 lg:px-16 relative max-h-full bg-white dark:bg-gray-900">
                    <div class="border border-gray-100 dark:border-gray-700 rounded overflow-hidden">
                        <table-loading v-show="loading" />
                        <has-error :form="form" field="permission" class="text-red-500" />
                        <div :class="{ 'border border-red-500': form.errors.has('permission') }"
                            v-for="(data, index) in permissions" 
                            :key="index" >
                            <ul class="flex justify-between bg-gray-100 dark:bg-gray-800 px-2 py-3">
                                <li class="text-gray-700 dark:text-gray-200 text-md title-font font-medium capitalize">{{ data[0].guard_name }}</li>
                                <li class="text-gray-700 dark:text-gray-200 text-md title-font font-medium capitalize">{{ $t('action')  }}</li>
                            </ul>
                            <!-- Permission table head end -->
                            <div class="px-3 py-3 flex justify-between dark:border-gray-800" 
                                 v-for="(permission, key) in data" 
                                 :key="key">
                                <div class="text-gray-600 dark:text-gray-200 text-sm font-medium  pl-4">
                                    {{ permission.name }}
                                </div>
                                <div>
                                    <toggle-button 
                                        :value="true" 
                                        :color="{checked: '#6366F1', unchecked: '#EF4444'}"
                                        :labels="true"
                                        @change="onChangeEventHandler($event, permission.slug)"
                                    />
                                </div>
                            </div><!-- Permission table body end -->
                        </div>
                    </div><!-- Permission table  end -->
                    <div class="flex justify-between align-items-center mt-4">
                        <router-link :to="{ name : 'settings.permission.create'}" class="text-indigo-500 mt-4 hidden md:block">
                        + Add new permissions
                        </router-link>
                        <v-button :loading="form.busy" class="button-primary">
                            <span class="mr-1">{{ $t('save')  }}</span>
                            <icon name="save" />
                        </v-button>
                    </div>
                </div>
            </div>


        </form>
        <!-- page content end -->


    </div>
</template>


<script>
import axios from 'axios'
import Form from 'vform'
export default {
  layout: 'dashboard',
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('role_create') }
  },

  data: () => ({
    breadcrumbs:[
        {
          name:'settings',
          url: 'settings.index'
        },
        {
            name: 'role',
            url: 'role.index'
        },
        {
            name: 'role_create'
        }
    ],
    loading: false,
    permissions: [],
    form: new Form({
        name:'',
        selectedPermission: []
    }),
  }),



  created() {
    this.breadcrumbsStore();
    this.getData();
  },

  methods: {

    // BREADCRUMBS
    breadcrumbsStore() {
        this.$store.dispatch('breadcrumbs/breadCrumbs', this.breadcrumbs);
    },

    // GET ALL ROLE  
    async getData() {
        this.loading = true;
        const { data } = await axios.get(window.location.origin+'/api/permission');
        this.permissions = data;
        // set permission for checkbox
        for(var guard_name in data) {
            for(var value in data[guard_name]) {
                this.form.selectedPermission.push(data[guard_name][value].slug);
            }
        }
        this.loading = false;
    },

    // ADD OR REMOVE PERMISSION SLUG WHEN CLICK TO TOGGLE-BUTTON
    onChangeEventHandler(e, permission) {
        if(e.value==false) {
            // remove item from array
            this.form.selectedPermission = this.form.selectedPermission.filter(function (item) {
                return permission != item;
            });
        } else {
            this.form.selectedPermission.push(permission);
        }
    },
    

    // SAVE ROLE
    async save () {

        await this.form.post(window.location.origin+'/api/role')
            .then(()=>{
                toast.fire({icon: 'success',title: this.$t('new_role_added')})
                this.$router.push({ name :'role.index'})
            }).catch(()=>{
                toast.fire({icon: 'error', title: this.$t('opps') + this.$t('something_is_wrong') + ' 😔'})
            });
    },


  }
}
</script>
