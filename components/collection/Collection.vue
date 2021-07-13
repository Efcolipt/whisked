<template lang="html">
   <div>
      <div v-if="loading" class="collections" >
      <SplashItemCollection v-for="n in 8" :key="n" />
    </div>
    <div v-if="!loading" class="collections" >
      <CollectionItem  v-for="movie in movies" :movie="movie" :key="movie.filmId"/>
    </div>
    <div v-if="!loading">
      <Download @download="$emit('download')" />
    </div>
   </div>
</template>

<script>
export default {
  props: {
    movies: {
      type: Array,
      default: () => [],
    },
    loading: {
      type: Boolean,
      default: true,
    },
  },
};
</script>

<style scoped>
</style>