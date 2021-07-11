<template lang="html">
    <div>
        <CollectionView :movie="movie" />
    </div>
</template>

<script>
export default {
  validate({params}){
      return params.id && parseInt(+params.id) && params.id > 0
  },
  async asyncData({ params, $axios }) {
    const api = "850a24d2-f3a2-4451-b89e-1d20d8149663"
    const movie = await $axios.$get(
      `https://kinopoiskapiunofficial.tech/api/v2.1/films/${params.id}` ,
      {
        headers: {
          "X-API-KEY": api,
        },
      }
    )

   

    return {
      movie: movie.data || [],

    };
  },
};
</script>

<style>
</style>