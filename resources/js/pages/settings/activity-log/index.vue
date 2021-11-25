<template>
    <div class="container mx-auto max-w-3xl">

        <!-- page-heading-start -->
        <div class="flex justify-between items-center w-full mb-4">
            <h1 class="page-heading">{{ $t('log') }}</h1>

            <button @click="clear()" class="button-primary bg-red-400 router-link-active">
                <icon name="trash" />
                <span class="ml-1">{{ $t('clear') }}</span>
            </button>
        </div>
        <!-- page-heading-End -->

        <!-- page content start -->
        <div class="relative ">
            <ul class="mt-2 border bg-white border-gray-100 dark:border-gray-800 dark:bg-gray-900 rounded-lg" v-show="logs && logs.length">
                <li v-for="(data, key) in logs" :key="key" class="pl-6 py-4 px-4 flex justify-between items-center" :class="{ 'border-b border-gray-100 dark:border-gray-800' : key + 1 < logs.length }">
                    <div>
                        <p class="text-gray-700 dark:text-gray-200 text-md title-font font-medium activity-logs-p" v-html="data.description"></p>
                        <p class="text-gray-500 text-sm">
                            {{ $t('by') }} 
                            <router-link to="" v-if="data.causer!='Unknown'" class="text-red-500 capitalize font-semibold">{{ data.causer.name }}</router-link>
                            | <span class="text-gray-700">{{ data.created_at | moment('from','now') }}</span>
                        </p>
                    </div>
                    
                    
                    <base-dropdown tag="div" class="md:relative animated py-1 md:py-0">
                        <button slot="title" :content="$t('options')" v-tippy='{ placement : "top", arrow : true }' class="w-8 h-8 text-gray-500 rounded-full bg-yellow-200 text-center border border-yellow-400">
                            <icon name="dot" classList="text-gray-700 m-auto" />
                        </button>
                        <template>
                            <div class="action-subitem">

                                <!-- item -->
                                <a @click="deleteData(data.id)" class="action-btn-item" href="#">
                                    <icon name="trash" classList="text-gray-500 mr-1" />
                                    {{ $t('delete') }}
                                </a>     
                                <!-- end item -->

                            </div>
                        </template>
                    </base-dropdown>
                </li>
            </ul>


            <infinite-loading @infinite="infiniteHandler" class="mt-10">
                <span slot="no-more">
                {{ $t('no_more_notification') }}...
                </span>
            </infinite-loading>
        </div>
        <!-- page-content-end -->

	</div>
</template>

<script>
import axios from 'axios'
import InfiniteLoading from 'vue-infinite-loading';
export default {
  layout: 'dashboard',
  middleware: 'auth',

  components: {
    InfiniteLoading,
  },

  metaInfo () {
    return { title: this.$t('log') }
  },

  data: () => ({
    breadcrumbs:[
        {
          name:'settings',
          url: 'settings.index'
        },
        {
            name: 'log'
        }
    ],
    logs:[],
    page: 1,
  }),


  created() {
    this.breadcrumbsStore();
  },

  methods: {

    // BREADCRUMBS
    breadcrumbsStore() {
        this.$store.dispatch('breadcrumbs/breadCrumbs', this.breadcrumbs);
    },

    // GET DATA
    infiniteHandler($state) {
        axios.get(window.location.origin+'/api/activity-log', {
            params: { page: this.page },
        }).then(({ data }) => {
            if (data.data.length) {
                this.page += 1;
                this.logs = this.logs.concat(data.data);
                $state.loaded();
            } else {
                $state.complete();
            }
        });
    },



    // DELETE DATA
    async deleteData(id, index) {
        Swal.fire({
            icon: 'error',
            title: this.$t('are_you_sure'),
            text: this.$t('you_will_not_able_to_return_this'),
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: this.$t('yes_delete_it')
            }).then((result) => {
                if (result.value) {
                    axios.delete(window.location.origin+'/api/activity-log/'+id).then(()=>{
                        Swal.fire(this.$t('deleted'), this.$t('your_file_has_been_deleted') ,'success' )
                        this.logs.splice(index, 1)
                    }).catch(()=> {
                        Swal.fire(this.$t('failed'), this.$t('there_was_something_wrong'), "warning")
                    });
            }
            })
    },

    // CLEAR ALL
    async clear() {
        if(this.logs.length > 0) {
            Swal.fire({
                icon: 'error',
                title: this.$t('are_you_sure'),
                text: this.$t('you_will_not_able_to_return_this'),
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: this.$t('yes_delete_it')
                }).then((result) => {
                if (result.value) {
                    axios.get(window.location.origin+'/api/activaty-log-clear').then((response)=>{
                        this.logs=[];
                        Swal.fire(this.$t('deleted'), this.$t('your_file_has_been_deleted') ,'success' )
                    }).catch(()=> {
                        Swal.fire(this.$t('failed'), this.$t('there_was_something_wrong'), "warning")
                    });
                }
            })
        } else {
            toast.fire(this.$t('error_alert_title'), this.$t('you_have_no_activity_log'), "warning");
        }
    }

  }
}
</script>
