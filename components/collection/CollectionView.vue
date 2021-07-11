<template lang="html">
  <div>
      <img :src="movie.posterUrl" :alt="movie.nameRu">
      <h2>{{ movie.nameRu }}</h2>
      <p>{{ movie.year }}</p>
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