<template lang="html">
  <div>
      <img 
        :src="movie[defaltId]['info']['poster']" 
        :alt="movie[defaltId]['info']['rus']"
      />
      <h2>{{ movie[defaltId]['info']['rus'] }}</h2>
      <p>{{ movie[defaltId]['info']['year'] }}</p>
  </div>
</template>

<script>
export default {
  props: {
    movie: {
      type: [Object, Array],
      required: true,
    },
    defaltId: {
      type: [String,Number],
      default: 0,
    },
  },
};
</script>

<style scoped>
</style>