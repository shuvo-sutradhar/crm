<template>
  <div @click="isOpen = !isOpen" class="relative" v-click-outside="closeDropDown">
    <a class="flex items-center z-10" href="#" >
      <!-- <country-flag country='en' size='big'/>
    <country-flag country='fr' size='small'/> -->
      {{ locales[locale] }}
      <icon name="arrow-down" class="ml-1" />
    </a>
    <div :class="[ isOpen ? 'fadeIn' : 'hidden']" class="text-gray-500 menu md:rounded bg-white dark:bg-gray-900 shadow-md absolute z-20 right-0 w-32 md:w-40 mt-7 overflow-hidden md:border dark:border-gray-800 md:border-gray-100 animated faster">
      
      <a v-for="(value, key) in locales" :key="key" class="z-10 px-4 py-2 block capitalize font-medium text-sm tracking-wide hover:bg-indigo-100 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-white dark:hover:bg-indigo-500 transition-all duration-300 ease-in-out" href="#"
         @click.prevent="setLocale(key)"
      >
        {{ value }}
      </a>
    </div>
  </div>
</template>


<script>
import { mapGetters } from 'vuex'
import { loadMessages } from '~/plugins/i18n'

export default {


  computed: mapGetters({
    locale: 'lang/locale',
    locales: 'lang/locales'
  }),


  data() {
    return {
      isOpen: false
    };
  },

  methods: {
    setLocale (locale) {
      if (this.$i18n.locale !== locale) {
        loadMessages(locale)
        this.$store.dispatch('lang/setLocale', { locale })
      }
    },

    closeDropDown() {
      this.isOpen = false;
    }

  }
}
</script>
