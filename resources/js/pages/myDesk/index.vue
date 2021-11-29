<template>
    <div class="container mx-auto max-w-7xl">

        <!-- page-heading-start -->
        <div class="flex justify-between mb-6 items-center">
          <div class="mb-0 md:mb-6 lg:mb-0">
            <button @click="filterstatus" class="button-primary bg-white text-gray-700 font-bold mr-2">
              <icon v-if="filter == false" name="filter" classList="text-gray-600 w-5 h-5 mr-1" />
              <icon v-else name="clsoe" classList="text-gray-600 w-5 h-5 mr-1" />
            </button>
            <form v-if="filter" class="mr-2 flex items-center justify-center">
              <div class="mx-2">
                <label>Form</label>
                <input @change="submitsearch" v-model="form.form" type="date" placeholder="from" class="input-field mr-1" />
              </div>

              <div>
                <label>To</label>
                <input @change="submitsearch" v-model="form.to" type="date" placeholder="from" class="input-field mr-1" />
              </div>
            </form>
          </div>

          <div class="flex items-center justify-center">
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
                              {{ data.attandance_for | moment('MMMM Do YYYY') }}
                            </td>
                            <td class="td">
                              <div v-if="data.status == 'present'">
                                {{ data.punched_in | moment('h:mm A') }}
                                <div v-if="data.punched_in">
                                  <span v-if="data.punched_in_status == 'early'" class="text-yellow-500 px-4 py-1 text-sm rounded-xl inline-block">Early</span>
                                  <span v-else-if="data.punched_in_status == 'late'" class="text-red-500 px-4 py-1 text-sm rounded-xl inline-block">Late</span>
                                  <span v-else class="text-indigo-500 px-4 py-1 text-sm rounded-xl inline-block">On time</span>
                                </div>
                                <div v-else>
                                 ---
                                </div>
                              </div>
                              <div v-else>
                                -----
                              </div>
                            </td>
                            <td class="td">
                              <div v-if="data.status == 'present'">
                                {{ data.punched_out | moment('h:mm A') }}
                                <div v-if="data.punched_out">
                                  <span v-if="data.punched_out_status == 'early'" class="text-red-500 px-4 py-1 text-sm rounded-xl inline-block">Leave Early</span>
                                  <span v-else class="text-indigo-500 px-4 py-1 text-sm rounded-xl mt-2 inline-block">On time</span>
                                </div>
                                <div v-else>
                                  At office now
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
                              <div v-if="data.total_hours">
                                {{ data.total_hours }}
                              </div>
                              <div v-else>
                                ----
                              </div>
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
import Form from 'vform'
import { mapGetters } from "vuex"
export default {
  layout: 'dashboard',
  middleware: 'auth',

  
  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    filter: false,
    form: new Form({
      form: '',
      to: ''
    }),
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


    async submitsearch(){
      this.$store.state.mydesk.loading=true;
      this.$store.dispatch("mydesk/fetchSearchData", {data: this.form, pagination: this.pagination.current_page});
    },

    filterstatus() {
      if(this.filter == false) {
        this.filter = true;
      } else {
        this.form.reset();
        this.filter = false;
      }
    }


  },



}
</script>
