<template>
    <div class="container mx-auto max-w-7xl">

        <!-- page-heading-start -->
        <div class="flex flex-wrap w-full mb-4">
          <div class="w-full mb-0 md:mb-6 lg:mb-0">
            <h1 class="page-heading">{{ $t('Attandance history') }}</h1>
          </div>
        </div>
        <!-- page-heading-End -->


        <!-- page content start -->
        <div class="grid relative">
            <table-loading v-show="loading" />
            <div class="overflow-x-auto shadow-sm rounded flex relative tbl-height">
                <table class="w-full whitespace-no-wrap bg-white table-striped">
                    <thead>
                        <tr class="text-left bg-gray-50 dark:bg-gray-900">
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
                            <td class="td">
                              {{ data.created_at | moment('MMMM Do YYYY') }}
                            </td>
                            <td class="td">
                              <div v-if="data.status == 'present'">
                                {{ data.punched_in | moment('h:mm A') }}
                                <div v-if="data.punched_in">
                                  <span v-if="data.punched_in_status == 'early'" class="text-yellow-500 px-4 py-1 text-sm rounded-xl inline-block">Early</span>
                                  <span v-else-if="data.punched_in_status == 'late'" class="text-red-500 px-4 py-1 text-sm rounded-xl inline-block">Late</span>
                                  <span v-else class="text-indigo-500 px-4 py-1 text-sm rounded-xl inline-block">On time</span>
                                </div>
                              </div>
                              <div v-else>
                                -----
                              </div>
                            </td>
                            <td class="td">
                              <div v-if="data.status == 'present'">
                                {{ data.punched_out | moment('h:mm A') }}
                                <div v-if="data.punched_out !== 'Not yet'">
                                  <span v-if="data.punched_out_status == 'early'" class="text-red-500 px-4 py-1 text-sm rounded-xl inline-block">Leave Early</span>
                                  <span v-else class="text-indigo-500 px-4 py-1 text-sm rounded-xl mt-2 inline-block">On time</span>
                                </div>
                              </div>
                              <div v-else>
                                -----
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
    </div>
</template>


<script>
import { mapGetters } from "vuex"
export default {
  layout: 'dashboard',
  middleware: 'auth',

  
  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({

  }),

  // GET TEAM DATA FROM VUEX-GETTERS
  computed: {
    ...mapGetters('mydesk', ['attandances','loading', 'pagination']),
  },

  created() {
    this.getData();
  },

  methods: {

    getData() {
      this.$store.state.mydesk.loading=true;
      this.$store.dispatch("mydesk/fetchAttandacne", this.pagination.current_page);
    },

    // PAGINATION
    async paginate(){
      this.getData();
    },
  },


}
</script>
