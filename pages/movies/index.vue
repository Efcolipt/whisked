<template lang="html">
    <div>
        <Collection :movies="popularMovies.films" />
        <div v-intersection="loadMore" style="width:100%;height:100px;" class="download__more"></div>
    </div>
</template>

<script>
export default {
  async asyncData({ params, $axios }) {
    const popularMovies = await $axios.$get(
      `https://kinopoiskapiunofficial.tech/api/v2.2/films/top`,
      {
        params: {
          type: "TOP_100_POPULAR_FILMS",
          page: 1,
        },
        headers: {
          "X-API-KEY": "850a24d2-f3a2-4451-b89e-1d20d8149663",
        },
      }
    );

    const awaitMovies = await $axios.$get(
      `https://kinopoiskapiunofficial.tech/api/v2.2/films/top`,
      {
        params: {
          type: "TOP_AWAIT_FILMS",
          page: 1,
        },
        headers: {
          "X-API-KEY": "850a24d2-f3a2-4451-b89e-1d20d8149663",
        },
      }
    );

    return {
      popularMovies,
      awaitMovies,
    };
  },

  data() {
    return {
      page: 1,
      limit: 20,
      totalPages:19
    };
  },

  methods: {
    async loadMore() {
      if (this.page >= this.totalPages) return
      try {
        this.page++
        const api = "850a24d2-f3a2-4451-b89e-1d20d8149663";
        const response = await this.$axios.$get(
          `https://kinopoiskapiunofficial.tech/api/v2.2/films/top`,
          {
            params: {
              type: "TOP_100_POPULAR_FILMS",
              page:this.page,
            },
            headers: {
               "X-API-KEY": "850a24d2-f3a2-4451-b89e-1d20d8149663",
            },
          }
        )
        this.popularMovies.films = [...this.popularMovies.films, ...response.films]
      } catch (e) {
        console.log(e);
      }
    },
  },
};
</script>

<style>

</style>