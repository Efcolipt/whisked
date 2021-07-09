<template lang="html">
    <div class="">
        {{users}}
    </div>
</template>

<script>
export default {
    async asyncData({ $axios, params }) {
        const users = await $axios.$get('/api/users/' + params.id)

        return {
          users,
        }
  },
}
</script>

<style lang="css" scoped>
</style>
