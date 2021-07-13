<template lang="html">
   <div class="collections" >
      <SplashCollection 
        v-if="initLoading" 
        v-for="n in 8" 
        :key="n" 
      />
      <CollectionItem  
        v-if="!initLoading"  
        v-for="movie in movies" 
        :movie="movie" 
        :key="movie.filmId"
      />
   </div>
</template>

<script>
export default {
  props: {
    movies: {
      type: [Object, Array],
      default: () => [],
    },
    initLoading: {
      type: Boolean,
      default: true,
    },
    loadingMore: {
      type: Boolean,
      default: false,
    },
  },
};
</script>

<style scoped></style>