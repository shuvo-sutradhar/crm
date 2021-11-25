<template>
  <section class="relative mb-20 overflow-hidden">

    <!-- header-shape-start -->
    <div class="absolute h-160 md:h-192 w-full top-0 left-0 bg-brand-section-light rounded-b-3xl lg:rounded-b-6xl"></div>
    <!-- header-shape-end -->

    <!-- navbar start -->
    <navbar />
    <!-- navbar-end -->


    <!-- banner area start -->
    <div class="relative container px-4 mx-auto">
        <div class="load-animation reveal-fast h-6 w-6 rounded-full bg-red-100 absolute left-0 top-1/4 -mt-32 md:-mt-48"></div>
        <div class="load-animation reveal-fast hidden sm:block h-8 w-8 rounded-full bg-cyan-100 absolute left-0 top-1/4 -mt-16 ml-40"></div>
        <div class="h-12 w-12 rounded-full bg-yellow-100 absolute left-0 top-1/4 mt-24 -ml-24"></div>
        <div class="load-animation reveal-slow hidden md:flex h-12 w-12 rounded-full bg-white shadow-circle items-center justify-center absolute left-0 top-1/4 ml-24 -mt-40">
          <img class="h-4" src="/../../../assets/images/react.svg" alt="">
        </div>
        <div class="load-animation reveal-slow hidden md:flex h-16 w-16 rounded-full bg-white shadow-circle items-center justify-center absolute left-0 top-1/4"><img class="h-6" src="/../../../assets/images/sass.svg" alt=""></div>
        <div class="load-animation reveal-slow hidden lg:flex h-12 w-12 rounded-full bg-white shadow-circle items-center justify-center absolute left-0 top-1/4 ml-40 mt-16"><img class="h-4" src="/../../../assets/images/material-ui.svg" alt=""></div>
        <div class="load-animation reveal-fast h-6 w-6 rounded-full bg-yellow-50 absolute right-0 top-1/4 -mt-32 md:-mt-48"></div>
        <div class="hidden sm:block h-8 w-8 rounded-full bg-indigo-100 absolute right-0 top-1/4 -mt-16 mr-40"></div>
        <div class="load-animation reveal-fast h-12 w-12 rounded-full bg-red-100 absolute right-0 top-1/4 mt-24 -mr-24"></div>
        <div class="load-animation reveal-slow hidden md:flex h-12 w-12 rounded-full bg-white shadow-circle items-center justify-center absolute right-0 top-1/4 mr-32 -mt-40"><img class="h-4" src="/vendor/shuffle/img/logos/tailwind-css.svg" alt=""></div>
        <div class="load-animation reveal-slow hidden md:flex h-16 w-16 rounded-full bg-white shadow-circle items-center justify-center absolute right-0 top-1/4"><img class="h-5" src="/vendor/shuffle/img/logos/bootstrap-logo.svg" alt=""></div>
        <div class="load-animation reveal-slow hidden lg:flex h-12 w-12 rounded-full bg-white shadow-circle items-center justify-center absolute right-0 top-1/4 mr-40 mt-16"><img class="h-4" src="/vendor/shuffle/img/logos/bulma.svg" alt=""></div>
        <div class="relative py-8 md:py-12 text-center">
            <div class="load-animation reveal-superfast max-w-3xl mx-auto mb-8">
                <h1 class="text-5xl md:text-6xl mb-4 font-bold font-heading leading-tight">
                    <span class="inline-block pt-1">Create </span>
                    <br class="sm:hidden">
                    <span class="inline-block pl-2 pr-4 relative text-white bg-brand-tailwind" data-toggle="typed" >Tail</span>
                    <span class="block">templates in minutes</span>
                </h1>
                <p class="text-secondary text-lg md:text-2xl leading-relaxed">The #1 visual editor for busy developers.</p>
            </div>
            <div class="load-animation reveal-fast">
                <a class="inline-block py-4 px-6 xs:py-4 xs:px-8 mr-4 bg-brand-blue hover:bg-blue-700 xs:text-lg text-white text-center font-semibold leading-none rounded-3xl transition duration-100" href="/editor?project=e139b0349fd8e7725a68f54c215f1697ca905f5c">Try Demo</a>
                <a class="inline-block py-4 px-6 xs:py-4 xs:px-8 bg-white hover:bg-blueGray-800 hover:text-white xs:text-lg text-center font-semibold leading-none rounded-3xl shadow-button transition duration-100" href="/#purchase" data-section="purchase">Sign Up</a>
            </div>
        </div>
        <div class="relative max-w-3xl mx-auto">
            <div class="load-animation reveal hidden lg:block absolute h-20 w-20 top-0 left-0 -ml-48 mt-12 rounded-xl bg-brand-green"></div>
            <div class="load-animation reveal hidden lg:block absolute h-32 w-20 top-0 left-0 -ml-20 mt-24 rounded-xl bg-brand-red"></div>
            <div class="load-animation reveal hidden lg:block absolute h-12 w-12 top-0 left-0 -ml-40 mt-40 rounded-bl-6xl bg-blue-600"></div>
            <div class="load-animation reveal hidden lg:block absolute h-24 w-20 bottom-0 left-0 -ml-20 mb-34 rounded-xl bg-brand-section-light"></div>
            <div class="load-animation reveal hidden lg:block absolute h-24 w-20 bottom-0 left-0 -ml-20 mb-6 rounded-bl-6xl rounded-tr-3xl bg-brand-yellow"></div>
            <div class="load-animation reveal hidden lg:block absolute h-12 w-12 top-0 right-0 -mr-40 mt-10 rounded-xl bg-brand-blue"></div>
            <div class="load-animation reveal hidden lg:block absolute h-40 w-20 top-0 right-0 -mr-20 mt-10 rounded-xl bg-brand-green"></div>
            <div class="load-animation reveal hidden lg:block absolute h-12 w-20 top-0 right-0 -mr-20 mt-56 rounded-b-6xl bg-brand-yellow"></div>
            <div class="load-animation reveal hidden lg:block absolute h-24 w-20 bottom-0 right-0 -mr-20 mb-34 rounded-bl-xl rounded-tr-6xl bg-brand-red"></div>
            <div class="load-animation reveal hidden lg:block absolute h-24 w-20 bottom-0 right-0 -mr-20 mb-6 rounded-xl bg-brand-section-light"></div>
            <div class="load-animation reveal-mid sm:px-8 pt-4 sm:pt-9 w-full lg:min-h-hero relative" data-toggle="video" data-target="#shuffle-video" id="hero-video-wrapper">
                <video poster="https://static.shuffle.dev/files/shuffle-hero-video.jpeg" id="shuffle-video" muted="" playsinline="" autoplay="" loop="" src="https://static.shuffle.dev/files/shuffle-hero.mp4" class="cursor-play rounded-xl"></video>
            </div>
            <!-- <script>
                const hw = document.getElementById('hero-video-wrapper');
                if (hw) hw.innerHTML = '<video poster="https://static.shuffle.dev/files/shuffle-hero-video.jpeg" id="shuffle-video" muted="" playsinline="" autoplay="" loop="" src="https://static.shuffle.dev/files/shuffle-hero.mp4" class="cursor-play rounded-xl"></video>';
            </script> -->
        </div>
    </div>
    <!-- banner area end -->

  </section>
</template>

<script>
import { mapGetters } from 'vuex'
import Navbar from '~/components/Navbar'

export default {
  layout: 'basic',

  components:{
     Navbar
  },
 
  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  })
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
