<template>
  <section class="text-gray-600 body-font">

    <div class=" mx-auto">
      <div class="flex flex-wrap w-full mb-4">
        <div class="w-full">
          <h1 class="page-heading">{{ $t('services') }}</h1>
        </div>
      </div>
      <div class="flex flex-wrap -m-4">

        <div class="p-4 lg:w-1/3 sm:w-1/2 w-full" v-for="(item, key) in items" :key="key">
          <div class="flex rounded shadow h-full bg-white dark:bg-gray-900 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0" :class="item.bg">
                <icon :name="item.icon" :classList="item.color"/>
              </div>
              <h2 class="box-heading">{{ $t(item.title) }}</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base text-gray-500 dark:text-gray-400">{{ item.details }}</p>
              <router-link :to="{ name: item.routeName }" class="mt-3 text-indigo-800 dark:text-indigo-400 hover:text-gray-500 inline-flex items-center group">{{ $t(item.btnName) }}
                <span class="group-hover:text-indigo-900"> <icon name="arrow-right" classList="text-indigo-500 transition duration-300 ease-in-out transform group-hover:translate-x-1" /></span>
              </router-link>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    breadcrumbs:[
        {
          name:'settings',
          url: ''
        }

    ],
    items: [
      {
        title: 'company-setings',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'office-building',
        routeName: 'company',
        color: 'text-indigo-500',
        bg: 'bg-indigo-200',
        btnName: 'change-settings'
      },
      {
        title: 'payment',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'credit-card',
        routeName: '',
        color: 'text-pink-500',
        bg: 'bg-pink-200',
        btnName: 'change-settings'
      },
      {
        title: 'orders',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'pdf',
        routeName: '',
        color: 'text-green-500',
        bg: 'bg-green-200',
        btnName: 'change-settings'
      },
      {
        title: 'team',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'users',
        routeName: 'team.index',
        color: 'text-red-500',
        bg: 'bg-red-200',
        btnName: 'view_detials'
      },
      {
        title: 'role-permission',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'lock-open',
        routeName: 'role.index',
        color: 'text-purple-500',
        bg: 'bg-purple-200',
        btnName: 'change-settings'
      },
      {
        title: 'tag',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'tag',
        routeName: 'tag',
        color: 'text-yellow-500',
        bg: 'bg-yellow-200',
        btnName: 'view_detials'
      },
      {
        title: 'log',
        details: 'Set your brand name and colors, upload your logo, connect your domain. and make your business more easier.',
        icon: 'rss',
        routeName: 'activity-log',
        color: 'text-purple-500',
        bg: 'bg-purple-200',
        btnName: 'view_log'
      }
    ]
  }),


  created() {
    this.breadcrumbsStore();
  },

  methods: {

      // BreadCrumb
      breadcrumbsStore() {
          this.$store.dispatch('breadcrumbs/breadCrumbs', this.breadcrumbs);
      }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
