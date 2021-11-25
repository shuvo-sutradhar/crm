<template>
    <div>
        <router-link :to="{ name: user ? 'home' : 'welcome' }" class="text-3xl font-semibold leading-none">
            <img class="h-8" src="/../../../assets/images/shuffle-logo.svg" alt="ESP" width="auto">
        </router-link>
    </div>
</template>


<script>

import { mapGetters } from 'vuex'
export default {
  name: 'Logo',

  computed: mapGetters({
    user: 'auth/user'
  }),

}

</script>
