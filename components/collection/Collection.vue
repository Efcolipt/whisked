<template lang="html">
  <div>
        <CollectionItem v-for="movie in movies" :movie="movie" :key="movie.filmId"/>
  </div>
</template>

<script>
export default {
    props:{
        movies:{
            type:Array,
            required:true
        },
        pagination:{
            type:Object,
            default: () => {}
        }
    },
}
</script>

<style scoped>

</style>