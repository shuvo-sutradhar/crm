<template>
    <div>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi aliquid iure praesentium? Harum ipsam mollitia culpa! Molestiae placeat, dolorem minima a nisi, corporis enim inventore nihil repellat magni, reprehenderit deserunt?
    </div>
</template>

<script>

export default {
  layout: 'dashboard',
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('client') }
  },

  data: () => ({
    breadcrumbs:[
        {
            name: 'clients',
            url: ''
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

</style>
