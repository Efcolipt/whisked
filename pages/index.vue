<template lang="html">
    <div class="container">
        <Collection @download="loadMore" :movies="popularMovies.films" :loading="loading" />
    </div>
</template>

<script>
export default {
  data() {
    return {
      page: 1,
      totalPages: 19,
      popularMovies: [],
      awaitMovies: [],
      loading: true,
    };
  },
  async created() {
    await this.init();
  },

  methods: {
    async init() {
      this.popularMovies = await this.getData(
        process.env.urlTopFilms,
        {
          type: "TOP_100_POPULAR_FILMS",
          page: 1,
        },
        this.page,
        this.totalPages
      );

      this.awaitMovies = await this.getData(
        process.env.urlTopFilms,
        {
          type: "TOP_AWAIT_FILMS",
          page: 1,
        },
        this.page,
        this.totalPages
      );

      this.loading = false
    },

    async loadMore() {
      if (this.totalPages <= this.page) return;
      const params = {
        type: "TOP_100_POPULAR_FILMS",
        page: ++this.page,
      };
      const data = await this.getData(
        process.env.urlTopFilms,
        params,
        this.page,
        this.totalPages
      );
      if (data)
        this.popularMovies.films = [...this.popularMovies.films, ...data.films];
    },
  },
};
</script>

<style scoped>
</style>