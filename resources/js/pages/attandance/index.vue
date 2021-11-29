<template>
    <div class="container mx-auto max-w-7xl" v-if="$can('attandance-history')">

        <!-- page-heading-start -->
        <div class="flex justify-between mb-6 items-center">
          <div class="mb-0 md:mb-6 lg:mb-0">
            <button @click="filter = !filter" class="button-primary bg-white text-gray-700 font-bold mr-2">
              <icon name="filter" classList="text-gray-600 w-5 h-5 mr-1" />
            </button>
            <form v-if="filter" class="mr-2 flex items-center justify-center">
              <div>
                <label>Select a user</label>
                <select @change="submitsearch" v-model="form.user" class="input-field">
                    <option value="" disabled selected>Select a user</option>
                    <option v-for="(data, index) in allUsers" :key="index" :value="data.id">{{ data.name }}</option>
                </select>
              </div>

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

            <button @click="open('manualAttandance')" class="button-primary bg-indigo-500 text-white font-bold">
              <icon name="finger-print" classList="text-white w-4 h-6 mr-1" />
              Manual Punch
            </button>
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
                            <th class="tr">{{ $t('User') }}</th>     
                            <th class="tr">{{ $t('Date') }}</th>     
                            <th class="tr">{{ $t('Punched In') }}</th>     
                            <th class="tr">{{ $t('Punched Out') }}</th>                    
                            <th class="tr">{{ $t('Type') }}</th>                   
                            <th class="tr">{{ $t('Total Hours') }}</th>                   
                            <th class="tr">{{ $t('status') }}</th>                   
                            <th class="tr">{{ $t('action') }}</th>                   
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
                              <span v-if="data.status == 'absent'" class="bg-red-200 text-red-500 text-sm rounded-full px-4 py-1"> Absent </span>
                              <span v-else-if="data.status == 'onleave'" class="bg-yellow-100 text-yellow-600 text-sm rounded-full px-4 py-1"> On leave </span>
                              <span v-else class="bg-indigo-200 text-indigo-500 text-sm rounded-full px-4 py-1"> Present </span>
                            </td>
                            <td class="td">
                              <base-dropdown tag="div" class="md:relative animated py-1 md:py-0">
                                  <button slot="title" class="w-8 h-8 text-gray-500 rounded-full bg-yellow-200 text-center border border-yellow-400">
                                      <icon name="dot" classList="text-gray-700 m-auto" />
                                  </button>
                                  <template>
                                      <div class="action-subitem">

                                          <!-- item -->
                                          <a @click="open('manualAttandanceEdit', data)" class="cursor-pointer action-btn-item border-b border-gray-100 dark:border-gray-700">
                                              <icon name="edit" classList="text-gray-500 mr-1" />
                                              {{ $t('edit') }}
                                          </a>     
                                          <!-- end item -->

                                          <!-- item -->
                                          <a @click="deleteData(data.id)" class="action-btn-item" href="#">
                                              <icon name="trash" classList="text-gray-500 mr-1" />
                                              {{ $t('delete') }}
                                          </a>     
                                          <!-- end item -->

                                      </div>
                                  </template>
                              </base-dropdown>
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
        <manual-attandance-edit v-if="this.$store.state.attandance.tagId" :data="this.$store.state.attandance.tagId" />
    </div>
</template>


<script>
import Form from 'vform'
import { mapGetters } from "vuex"
import ManualAttandance from '~/components/attandance/manualAttandance'
import ManualAttandanceEdit from '~/components/attandance/manualAttandanceEdit'

export default {
  layout: 'dashboard',
  middleware: 'auth',
  components: { ManualAttandance, ManualAttandanceEdit },

  
  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    filter: false,
    form: new Form({
      user: '',
      form: '',
      to: ''
    }),
  }),

  // GET TEAM DATA FROM VUEX-GETTERS
  computed: {
    ...mapGetters('attandance', ['attandances','loading', 'pagination']),
    ...mapGetters('team', ['allUsers']),
  },

  created() {
    this.getData();
    
    Fire.$on('AfterDelete',() => {
        this.getData();
    });
    
  },


  methods: {

    getData() {
      this.$store.state.attandance.loading=true;
      this.$store.dispatch("attandance/fetchAttandacne", this.pagination.current_page);
			this.$store.dispatch("team/fetchAllUser")
    },

    // PAGINATION
    async paginate(){
      this.getData();
    },


    // punch in-out modal
    open(name, data=null) {
        this.$store.dispatch("modals/open", name);
        if(data!=null){
            this.$store.state.attandance.tagId=data;
        }
    },


    // DELETE DATA
    async deleteData(id) {
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
                    axios.delete(window.location.origin+'/api/attandance/'+id).then(()=>{
                        Swal.fire(this.$t('deleted'), this.$t('your_file_has_been_deleted') ,'success' )
                        Fire.$emit('AfterDelete');
                    }).catch(()=> {
                        Swal.fire(this.$t('failed'), this.$t('there_was_something_wrong'), "warning")
                    });
                }
            })
    },

    async submitsearch(){
      this.$store.state.attandance.loading=true;
      this.$store.dispatch("attandance/fetchSearchData", {data: this.form, pagination: this.pagination.current_page});
    }

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