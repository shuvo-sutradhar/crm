<template>
    <li>
        <a v-if="this.$store.state.themeConfig.dark == false" class="cursor-pointer" @click="addDarkMode" data-toggle="tooltip" data-placement="top" title="dark-mode">
            <icon name="sun" classList="text-gray-400 hover:text-gray-300" />
        </a>
        <a v-else class="cursor-pointer" @click="removeDarkMode" data-toggle="tooltip" data-placement="top" title="dark-mode">
           <icon name="moon" classList="text-gray-400 hover:text-gray-300" />
        </a>
    </li>
</template>


<script>

export default {

  methods: { 

    isDarkMode() {
        if (localStorage.darkMode) {
            document.body.classList.add('dark')
            this.$store.dispatch('themeConfig/darkMode', true);
        } else {
            this.$store.dispatch('themeConfig/darkMode', false);
        }
    },

    removeDarkMode() {
        localStorage.removeItem('darkMode');
        document.body.classList.remove('dark')
        this.$store.dispatch('themeConfig/darkMode', false);
    },

    addDarkMode() {
        localStorage.darkMode = true;
        this.isDarkMode();
        this.$store.dispatch('themeConfig/darkMode', true);
    },

  },

}
</script>