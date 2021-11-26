<template>
  <div>
    <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-9 gap-4">
      <div class="col-span-1 md:col-span-6 lg:col-span-3 rounded shadow h-full p-8 flex-col bg-gradient-to-r from-blue-800 vai-purple-800 to-indigo-600 text-white relative">
        <div class="flex justify-between ">
          <div>
            <h2 class="text-2xl font-semibold">Good morning,<br> Mr. Jon Doe</h2>
            <h4 class="text-xl text-gray-300 mt-4">Welcome to your dashboard</h4>
            <button class="button-primary mt-6 bg-white text-gray-800 font-bold">
              <icon name="finger-print" classList="text-gray-500 w-6 h-6 mr-1" />
              Punch In
            </button>
          </div>
          <clock></clock>
        </div>
      </div>
      <div class="relative overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 rounded shadow h-full bg-white dark:bg-gray-900 p-2 py-8 flex-col flex justify-center items-center">

          <div class="bg-yellow-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
              <icon name="clock" classList="text-yellow-500 w-6 h-6" />
          </div>
          <h2 class="text-4xl font-semibold text-yellow-400 my-4">12:03 PM</h2>
          <h3 class="text-md absolute top-9 -right-12 bg-yellow-200 py-2 px-12 transform rotate-45 uppercase font-semibold">Punch In Time</h3>

      </div>
      <div class="relative overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 rounded shadow h-full bg-white dark:bg-gray-900 p-2 py-8 flex-col flex-col flex justify-center items-center">

          <div class="bg-indigo-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
              <icon name="clock" classList="text-indigo-400 w-6 h-6" />
          </div>
          <h2 class="text-4xl font-semibold text-indigo-400 my-4">12:03 PM</h2>
          <h3 class="text-md absolute top-12 -right-12 bg-indigo-200 py-2 px-12 transform rotate-45 uppercase font-semibold">Working Hours</h3>
   
      </div>
      <div class="relative overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 rounded shadow h-full bg-white dark:bg-gray-900 p-2 py-8 flex-col flex-col flex justify-center items-center">
  
          <div class="bg-red-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
              <icon name="clock" classList="text-red-500 w-6 h-6" />
          </div>
          <h2 class="text-4xl font-semibold text-red-500 my-4">12:03 PM</h2>
          <h3 class="text-md absolute top-10 -right-12 bg-red-200 py-2 px-12 transform rotate-45 uppercase font-semibold">Punch In Time</h3></h3>
     
      </div>
    </div>
  </div>
</template>

<script>
import Clock from 'vue-clock2';
// import axios from 'axios'
export default {
  layout: 'dashboard',
  middleware: 'auth',
  components: { Clock },

  
    IconmetaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
  }),

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