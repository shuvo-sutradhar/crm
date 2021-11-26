<template>
    <div class="container mx-auto max-w-3xl">

        <!-- page-heading-start -->
        <div class="flex justify-between items-center w-full mb-4">
            <h1 class="page-heading">{{ $t('leave_settings') }}</h1>


            <a @click="open('createDepartment')" class="button-primary cursor-pointer">
                <icon name="plus-sm" />
                <span class="ml-1">{{ $t('add_new') }}</span>
            </a>
        </div>
        <!-- page-heading-End -->

        <!-- page content start -->
        <div class="relative">
            
            <table-loading v-show="loading" class="w-64 h-64" />
            <ul class="mt-2 border bg-white border-gray-100 dark:border-gray-800 dark:bg-gray-900 rounded-lg overflow-hidden" v-show="departments && departments.length">
                <li class="py-2 px-4 flex justify-between items-center bg-gray-300 font-semibold">
                    <span>Name</span>
                    <span>Action</span>
                </li>
                <li v-for="(data, key) in departments" :key="key" class="py-2 px-4 flex justify-between items-center border-b border-gray-10">
                    <router-link :to="{ name: 'role.edit', params: { slug: data.slug } }" class="text-gray-700 dark:text-gray-200 text-md title-font font-medium">{{ data.name }}</router-link>
                    <base-dropdown tag="div" class="md:relative animated py-1 md:py-0">
                        <button slot="title" :content="$t('options')" v-tippy='{ placement : "top", arrow : true }' class="w-8 h-8 text-gray-500 rounded-full bg-yellow-200 text-center border border-yellow-400">
                            <icon name="dot" classList="text-gray-700 m-auto" />
                        </button>
                        <template>
                            <div class="action-subitem">

                                <!-- item -->
                                <router-link :to="{ name: 'role.edit', params: { slug: data.slug } }" class="action-btn-item border-b border-gray-100 dark:border-gray-700">
                                    <icon name="edit" classList="text-gray-500 mr-1" />
                                    {{ $t('edit') }}
                                </router-link>     
                                <!-- end item -->


                                <!-- item -->
                                <a @click="deleteData(data.slug)" class="action-btn-item" href="#">
                                    <icon name="trash" classList="text-gray-500 mr-1" />
                                    {{ $t('delete') }}
                                </a>     
                                <!-- end item -->

                            </div>
                        </template>
                    </base-dropdown>
                </li>
            </ul>
            <div v-show="!loading && departments && !departments.length" class="text-center py-8">
                <img src="/../../../assets/images/system-img/result-not-found.svg" class="w-64 m-auto" alt="result-not-found" />
                <p class="font-bold text-lg text-gray-600 dark:text-gray-200">{{ $t('sorry') }} 😔 {{ $t('no_data_found') }}.</p>
            </div>
        </div>
        <!-- page-content-end -->

        <!-- pegination-start -->
        <pagination v-if="pagination.last_page > 1"
                :pagination="pagination"
                :offset="5"
                class="justify-flex-end"
                @paginate="paginate">
        </pagination>
        <!-- pegination-end -->

        <department-create />
    </div>
</template>


<script>
import axios from 'axios'
import { mapGetters } from "vuex"
import DepartmentCreate from '~/components/department/create'
import DepartmentEdit from '~/components/department/edit'

export default {
    layout: 'dashboard',
    middleware: 'auth',

    metaInfo () {
        return { title: this.$t('department') }
    },

    components: {
        DepartmentCreate,
        DepartmentEdit
    },


    // Map Getters
    computed: {
        ...mapGetters('department', ['departments','loading','pagination']),
    },

    data: () => ({
        breadcrumbs:[
            {
            name:'settings',
            url: 'settings.index'
            },
            {
                name: 'department'
            }
        ],
    }),



  created() {
    this.getData();
    this.breadcrumbsStore();
    Fire.$on('AfterDelete',() => {
        this.getData();
    });
  },

  methods: {

    // BREADCRUMBS
    breadcrumbsStore() {
        this.$store.dispatch('breadcrumbs/breadCrumbs', this.breadcrumbs);
    },

    // GET ALL ROLE  
    async getData() {
        this.$store.state.department.loading=true;
        await this.$store.dispatch('department/fetchDept', this.pagination.current_page);
    },


    // add tag modal
    open(name) {
        this.$store.dispatch("modals/open", name);
        // if(tag!=null){
        //     this.$store.state.tag.tagSlug=tag;
        // }
    },

    // DELETE DATA
    async deleteData(slug) {
        Swal.fire({
            icon: 'error',
            title: this.$t('are_you_sure'),
            text: this.$t('you_will_not_able_to_return_this'),
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: this.$t('yes_delete_it')
            }).then((result) => {
                // Send request to the server
                if (result.value) {
                    axios.delete(window.location.origin+'/api/role/'+slug).then(()=>{
                        Swal.fire(this.$t('deleted'), this.$t('your_file_has_been_deleted') ,'success' )
                        Fire.$emit('AfterDelete');
                    }).catch(()=> {
                        Swal.fire(this.$t('failed'), this.$t('there_was_something_wrong'), "warning")
                    });
                }
            })
    },

    // PAGINATION
    async paginate(){
        //this.query ==='' ? this.getData() : this.searchData();
        this.getData();
    },

  }
}
</script>
