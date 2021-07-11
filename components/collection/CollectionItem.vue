<template lang="html">
  <div>
    <NuxtLink :to="'/movies/' + movie.filmId" >

      <img :src="movie.posterUrl" :alt="movie.nameRu">
      <h2>{{ movie.nameRu }}</h2>
      <p>{{ movie.year }}</p>
    </NuxtLink>
  </div>
</template>

<script>
export default {
    props:{
        movie:{
            type:Object,
            required:true,
        }
    }
}
</script>

<style scoped>

</style>