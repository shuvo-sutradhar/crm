<template>
    <div class="container mx-auto max-w-7xl" v-if="$can('attandance-history')">

        <!-- page-heading-start -->
        <div class="flex justify-between mb-6 items-center">
          <div class="mb-0 md:mb-6 lg:mb-0">
            <h1 class="page-heading">{{ $t('Attandance history') }}</h1>
          </div>
          <button @click="open('manualAttandance')" class="button-primary bg-indigo-500 text-white font-bold">
            <icon name="finger-print" classList="text-white w-6 h-6 mr-1" />
            Manual Punch
          </button>
        </div>
        <!-- page-heading-End -->


        <!-- page content start -->
        <div class="grid relative">
            <table-loading v-show="loading" />
            <div class="overflow-x-auto shadow-sm rounded flex relative tbl-height">
                <table class="w-full whitespace-no-wrap bg-white table-striped">
                    <thead>
                        <tr class="text-left bg-gray-50 dark:bg-gray-900">
                            <th class="tr">{{ $t('User') }}</th>     
                            <th class="tr">{{ $t('Date') }}</th>     
                            <th class="tr">{{ $t('Punched In') }}</th>     
                            <th class="tr">{{ $t('Punched Out') }}</th>                    
                            <th class="tr">{{ $t('Type') }}</th>                   
                            <th class="tr">{{ $t('Total Hours') }}</th>                   
                            <th class="tr">{{ $t('status') }}</th>                   
                        </tr>
                    </thead>
                
                    <tbody class="dark:bg-gray-900">
                        <tr v-show="attandances.length" v-for="(data, index) in attandances" :key="index" class="hover:bg-gray-100 dark:hover:bg-gray-800">
                            
                            <td class="td text-left">
                                <router-link to="" class="z-10 menu-btn focus:outline-none flex items-center px-3 md:px-0">
                                    <div class="w-12 h-12 overflow-hidden rounded-full shadow-sm border-2 border-indigo-200">
                                        <img :src="data.user.photo_url" class="w-full h-full object-cover" alt="s" >
                                    </div> 
                                    <div class="ml-2">
                                        <p class="flex-1 text-indigo-500 capitalize dark:text-gray-300">{{ data.user.name }}</p>
                                    </div>
                                </router-link>
                            </td>
                            <td class="td">
                              {{ data.created_at | moment('MMMM Do YYYY') }}
                            </td>
                            <td class="td">
                                {{ data.punched_in | moment('h:mm A') }}

                              <div v-if="data.punched_in">
                                <span v-if="data.punched_in_status == 'early'" class="text-yellow-500 px-4 py-1 text-sm rounded-xl inline-block">Early</span>
                                <span v-else-if="data.punched_in_status == 'late'" class="text-red-500 px-4 py-1 text-sm rounded-xl inline-block">Late</span>
                                <span v-else class="text-indigo-500 px-4 py-1 text-sm rounded-xl inline-block">On time</span>
                              </div>
                            </td>
                            <td class="td">
                              {{ data.punched_out | moment('h:mm A') }}
                              <div v-if="data.punched_out !== 'Not yet'">
                                <span v-if="data.punched_out_status == 'early'" class="text-red-500 px-4 py-1 text-sm rounded-xl inline-block">Leave Early</span>
                                <span v-else class="text-indigo-500 px-4 py-1 text-sm rounded-xl mt-2 inline-block">On time</span>
                              </div>
                            </td>
                            <td class="td capitalize">
                              {{ data.attandance_type }}
                            </td>
                            <td class="td">
                              {{ data.total_hours }}
                            </td>
                            <td class="td">
                             <span v-if="data.status == 'present'" class="bg-indigo-200 text-indigo-500 text-sm rounded-full px-4 py-1"> Present </span>
                             <span v-else class="bg-red-200 text-red-500 text-sm rounded-full px-4 py-1"> Absent </span>
                            </td>
                        </tr>
                        <tr v-show="!loading && !attandances.length">
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

        <manual-attandance />
    </div>
</template>


<script>
import { mapGetters } from "vuex"
import ManualAttandance from '~/components/attandance/manualAttandance'

export default {
  layout: 'dashboard',
  middleware: 'auth',
  components: { ManualAttandance },

  
  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({

  }),

  // GET TEAM DATA FROM VUEX-GETTERS
  computed: {
    ...mapGetters('attandance', ['attandances','loading', 'pagination']),
  },

  created() {
    this.getData();
  },

  methods: {

    getData() {
      this.$store.state.attandance.loading=true;
      this.$store.dispatch("attandance/fetchAttandacne", this.pagination.current_page);
    },

    // PAGINATION
    async paginate(){
      this.getData();
    },


    // punch in-out modal
    open(name) {
        this.$store.dispatch("modals/open", name);
        // if(tag!=null){
        //     this.$store.state.tag.tagSlug=tag;
        // }
    },

  },


}
</script>


<style>

.clock {
    width: 100px;
    height: 100px;
    font-size: 12px;
}

.clock .clock-hour{
  background-color: #F36565 !important;
}

.clock .clock-minute{
  background-color: #EF61A8 !important;
}

.clock .clock-second {
  background-color: #fff !important;
}

</style>