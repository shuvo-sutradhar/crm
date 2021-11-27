<template>
  <div>
    <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-9 gap-4">
      <div class="col-span-1 md:col-span-6 lg:col-span-3 rounded shadow h-full p-8 flex-col bg-gradient-to-r from-blue-800 vai-purple-800 to-indigo-600 text-white relative">
        <div class="flex justify-between ">
          <div>
            <h2 class="text-2xl font-semibold">Good morning,<br> Mr. Jon Doe</h2>
            <h4 class="text-xl text-gray-300 mt-4">Welcome to your dashboard</h4>
            <button v-if="!todaysAttandance" @click="open('punchIn')" class="button-primary mt-6 bg-white text-gray-800 font-bold">
              <icon name="finger-print" classList="text-gray-500 w-6 h-6 mr-1" />
              Punch In
            </button>
            <button v-if="todaysAttandance && !todaysAttandance.punched_out" @click="open('punchOut')" class="button-primary mt-6 bg-pink-500 text-white font-bold">
              <icon name="finger-print" classList="text-gray-100 w-6 h-6 mr-1" />
              Punch Out
            </button>
          </div>
          <clock></clock>
        </div>
      </div>
      <div class="relative overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 rounded shadow h-full bg-white dark:bg-gray-900 p-2 py-8 flex-col flex justify-center items-center">

          <div class=" bg-gray-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
              <icon name="clock" classList="text-gray-700 w-6 h-6" />
          </div>
          <h2 class="text-4xl font-semibold text-gray-700 my-4" v-if="todaysAttandance">{{ todaysAttandance.punched_in | moment('h:mm A') }}</h2>
          <h2 class="text-4xl font-semibold text-gray-700 my-4" v-else>00:00</h2>
          <h3 class="text-md bg-gray-700 text-gray-100 py-2 px-12 uppercase font-semibold rounded-sm ">Punch In Time</h3>

      </div>
      <div class="relative overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 rounded shadow h-full bg-white dark:bg-gray-900 p-2 py-8 flex-col flex-col flex justify-center items-center">

          <div class="bg-indigo-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
              <icon name="clock" classList="text-indigo-400 w-6 h-6" />
          </div>
          <h2 class="text-4xl font-semibold text-indigo-400 my-4">{{ hoursDiff }}:{{ minutesDiff }}:{{ secondsDiff }}</h2>
          <h3 class="text-md bg-indigo-200 text-indigo-500 py-2 px-12 uppercase font-semibold rounded-sm ">Working Hours</h3>
   
      </div>
      <div class="relative overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 rounded shadow h-full bg-white dark:bg-gray-900 p-2 py-8 flex-col flex-col flex justify-center items-center">
  
          <div class="bg-yellow-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
              <icon name="clock" classList="text-yellow-500 w-6 h-6" />
          </div>          

          <h2 class="text-4xl text-yellow-400 font-semibold my-4" v-if="todaysAttandance && todaysAttandance.punched_out">{{ todaysAttandance.punched_out | moment('h:mm A') }}</h2>
          <h2 class="text-4xl font-semibold text-gray-700 my-4" v-else>00:00</h2>
          <h3 class="text-sm font-semibold bg-yellow-200 text-yellow-500 py-2 px-12 uppercase rounded-sm ">Punch Out Time</h3>
      </div>
    </div>


    <punch-in />
    <punch-out />
  </div>
</template>

<script>
import { mapGetters } from "vuex"
import Clock from 'vue-clock2';
import PunchIn from '~/components/attandance/punchIn'
import PunchOut from '~/components/attandance/punchOut'
const moment= require('moment') 
// import axios from 'axios'
export default {
  layout: 'dashboard',
  middleware: 'auth',

  components: {
    Clock,
    PunchIn,
    PunchOut,
  },

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    hoursDiff: null,
    minutesDiff: null,
    secondsDiff: null
  }),

  // GET TEAM DATA FROM VUEX-GETTERS
  computed: {
      ...mapGetters('mydesk', ['todaysAttandance']),

  },

  mounted: function(){   
    this.getData();
    this.workingHours();
  },

  watch() {

  },

  methods: {

    getData() {
      this.$store.dispatch("mydesk/fetchTodaysAttandance");
    },

    workingHours() {

      //return moment().diff(this.todaysAttandance.punched_in, 'minutes')

      var startTime = moment(this.todaysAttandance.punched_in, 'DD-MM-YYYY hh:mm:ss');
      var endTime = moment(this.todaysAttandance.punched_out, 'DD-MM-YYYY hh:mm:ss');
    
      this.hoursDiff = endTime.diff(startTime, 'hours');
      console.log('Hours:' + this.hoursDiff);
    
      this.minutesDiff = endTime.diff(startTime, 'minutes');
      console.log('Minutes:' + this.minutesDiff);
    
      this.secondsDiff = endTime.diff(startTime, 'seconds');
      console.log('Seconds:' + this.secondsDiff);


    },

    // punch in-out modal
    open(name) {
        this.$store.dispatch("modals/open", name);
        // if(tag!=null){
        //     this.$store.state.tag.tagSlug=tag;
        // }
    },
  }

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