<template>
    <div class="container mx-auto max-w-6xl">

        <!-- page-heading-start -->
        <div class="flex flex-wrap w-full mb-4">
          <div class="w-full mb-0 md:mb-6 lg:mb-0">
            <h1 class="page-heading">{{ $t('team') }}</h1>
          </div>
        </div>
        <!-- page-heading-End -->

        <!-- page-search-start -->
        <div class="pb-12 md:pb-0 mb-4 flex justify-between items-center relative">
            <div class="flex">
                <button @click="deleteSelected" class="btn-trash" v-if="selected.length > 0">
                  <icon name="trash" classList="text-gray-500 dark:text-gray-400 w-5 h-5" />
                </button>

                <div class="search">
                    <search v-model="query" @reset-pagination="resetPagination()" @reload="reload" />
                </div>
            </div>
            <router-link :to="{ name: 'team.create' }" class="button-primary">
                <icon name="plus-sm" />
                <span class="ml-1">{{ $t('add_new') }}</span>
            </router-link>
        </div>
        <!-- page-search-end -->

        <!-- page content start -->
        <div class="grid relative">
            <table-loading v-show="loading" />
            <div class="overflow-x-auto shadow-sm rounded flex relative tbl-height">
                <table class="w-full whitespace-no-wrap bg-white table-striped">
                    <thead>
                        <tr class="text-left bg-gray-50 dark:bg-gray-900">
                            <th class="text-center py-2 px-2 tr">
                                <checkbox v-model="selectAll" @click="select" class="text-center mt-1.5" />
                            </th>
                            <th class="tr">
                                <span>{{ $t('name') }}</span>
                            </th>
                            <th class="tr">{{ $t('phone') }}</th>     
                            <th class="tr">{{ $t('role') }}</th>     
                            <th class="tr">{{ $t('join_date') }}</th>                   
                            <th class="tr">{{ $t('last_login') }}</th>                   
                            <th class="tr text-right border-r-0">{{ $t('action') }}</th>
                        </tr>
                    </thead>
                
                    <tbody class="dark:bg-gray-900">
                        <tr v-show="teams.length" v-for="(data, index) in teams" :key="index" class="hover:bg-gray-100 dark:hover:bg-gray-800">
                            <td class="td px-2 text-center">
                                <div class="inline-flex items-center">
                                    <input :disabled="user.account_role == data.account_role " id="ckbox" type="checkbox" :value="data.slug" v-model="selected" @change="isAllSelected" :class="{ 'disable-color cursor-not-allowed' : user.account_role == data.account_role }" class="form-checkbox ckbox-size text-indigo-600" >
                                    <label for="ckbox" class="ml-2 text-gray-500 dark:text-gray-200"></label>
                                </div>
                            </td>
                            <td class="td text-left">
                                <router-link to="" class="z-10 menu-btn focus:outline-none flex items-center px-3 md:px-0">
                                    <div class="w-12 h-12 overflow-hidden rounded-full shadow-sm border-2 border-indigo-200">
                                        <img :src="data.photo_url" class="w-full h-full object-cover" alt="s" >
                                    </div> 
                                    <div class="ml-2">
                                        <p class="flex-1 text-indigo-500 capitalize dark:text-gray-300">{{ data.name }}</p>
                                        <a href="mailto:data.email" class="text-gray-600 text-center dark:text-gray-500">
                                            {{ data.email }}
                                        </a>
                                    </div>
                                </router-link>
                            </td>
                            <td class="td">
                                <span v-if="data.phone">{{ data.phone }}</span>
                                <span v-else>-----</span>
                            </td>
                            <td class="td">
                                <span v-if="data.account_role==0" class="inline-block bg-red-200 text-red-500 text-sm px-2 rounded-full tracking-wide">{{ $t('owner') }}</span>
                                <span v-else-if="data.account_role==1 && data.role[0]">{{ data.role[0].name }}</span>
                                <span v-else>{{ $t('undefined') }}</span>
                            </td>
                            <td class="td">
                                <span>{{ data.created_at | moment("from","now") }}</span>
                            </td>
                            <td class="td">
                               <span v-if="data.last_login_at" >{{ data.last_login_at | moment("from", "now") }}</span>
                               <span v-else>{{ $t('never_logged_in') }}</span>
                            </td>
                            <td class="td text-right border-r-0">
                                <base-dropdown tag="div" class="md:relative animated py-1 md:py-0">
                                    <button slot="title" :content="$t('options')" v-tippy='{ placement : "top", arrow : true }' class="w-10 h-10 text-gray-500 rounded-full bg-yellow-200 text-center border border-yellow-400">
                                        <icon name="dot" classList="text-gray-700 m-auto" />
                                    </button>
                                    <template>
                                        <div class="action-subitem">


                                            <!-- item -->
                                            <router-link :to="{ name: 'team.edit', params: { slug: data.slug } }" class="action-btn-item border-b border-gray-100 dark:border-gray-700">
                                                <icon name="edit" classList="text-gray-500 mr-1" />
                                                {{ $t('edit') }}
                                            </router-link>     
                                            <!-- end item -->


                                            <!-- item -->
                                            <a v-if="user.account_role !== data.account_role" @click="deleteData(data.slug)" class="action-btn-item" href="#">
                                                <icon name="trash" classList="text-gray-500 mr-1" />
                                                {{ $t('delete') }}
                                            </a>     
                                            <!-- end item -->

                                        </div>
                                    </template>
                                </base-dropdown>
                            </td>
                        </tr>
                        <tr v-show="!loading && !teams.length">
                            <td colspan="7">
                                <div class="text-center py-8">
                                    <img src="/../../../assets/images/system-img/result-not-found.svg" class="w-64 m-auto" alt="result-not-found" />
                                    <p class="font-bold text-lg text-gray-600 dark:text-gray-200">{{ $t('sorry') }} 😔 {{ $t('no_data_found') }}.</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- pegination-start -->
            <pagination v-if="pagination && pagination.last_page > 1"
                    :pagination="pagination"
                    :offset="5"
                    class="justify-end"
                    @paginate="paginate">
            </pagination>
            <!-- pegination-end -->
        </div>


        <!-- page content end -->

    </div>
</template>


<script>
import { mapGetters } from "vuex"

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
                url: ''
            }
        ],

        query:'',
        selected: [],
        selectAll:false,
    }),

    watch:{
        // WATCH SEARCH DATA
        query: function(newQ, oldQ) {
            if(newQ==='') {
               this.getData();
            } else {
                this.searchData();
            }
        }
    },

    // GET TEAM DATA FROM VUEX-GETTERS
    computed: {
        ...mapGetters('team', ['teams','loading','pagination']),
        ...mapGetters('auth', ['user']),
    },


    created() {
        this.getData();
        this.breadcrumbsStore();
    },

    methods: {

        // GET DATA
        async getData() {
            this.$store.state.team.loading=true;
            await this.$store.dispatch('team/fetchTeam', this.pagination.current_page);
        },

        // SEARCH DATA
        async searchData() {
            this.$store.state.team.loading=true;
            await this.$store.dispatch('team/fetchSearchData', { query: this.query, current_page:this.pagination.current_page });
        },

        // CLEAR SEARCH FIELD
        async reload() {
            this.query = '';
        },

        // PAGINATION
        async paginate(){
            this.query ==='' ? this.getData() : this.searchData();
        },

        // RESET PAGINATION
        async resetPagination() {
            this.pagination.current_page=1;
        },

        // BREADCRUMB
        breadcrumbsStore() {
            this.$store.dispatch('breadcrumbs/breadCrumbs', this.breadcrumbs);
        },

        // SELECT 
        select() {
			this.selected = [];
			if (!this.selectAll) {
				for (let i in this.teams) {
                    if(this.teams[i].account_role !== 0) {
					    this.selected.push(this.teams[i].slug);
                    }
				}
			}
        },

        // CHECK IS ALL SELECTED OR NOT
        isAllSelected() {
            if(this.selected.length <= 0) {
                this.selectAll = false
            } else {
                this.selectAll = true
            }
        },


        // DELETE SINGLE ROWS
        async deleteData(slug) {
            Swal.fire({
                icon: 'error',
                title: this.$t('are_you_sure'),
                text: this.$t('you_will_not_able_to_return_this'),
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.$store.dispatch('team/deleteTeam', slug)
                        .then(()=>{
                            Swal.fire(this.$t('deleted'), this.$t('your_file_has_been_deleted') ,'success' )
                        }).catch(()=> {
                            Swal.fire(this.$t('failed'), this.$t('there_was_something_wrong'), "warning")
                        });
                    }
                })
        },
        
        // DELETE MULTIPLE ROWS 
        async deleteSelected() {
            Swal.fire({
                icon: 'error',
                title: this.$t('are_you_sure_to_delete') + ' ' + this.selected.length + ' ' + this.$t('rows') +'?',
                text: this.$t('you_will_not_able_to_return_this'),
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: this.$t('cancle'),
                confirmButtonText: this.$t('yes_delete_it')
                }).then((result) => {
                    if (result.value) {
                        this.$store.dispatch('team/deleteSelectedTeams', this.selected).then(()=>{
                            Swal.fire(this.$t('deleted'), this.$t('your_file_has_been_deleted') ,'success' )
                            this.selectAll = false;
                        }).catch(()=> {
                            Swal.fire(this.$t('failed'), this.$t('there_was_something_wrong'), "warning");
                        });                        
                    }
                })
        },

    }
}
</script>