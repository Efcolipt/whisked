<template lang="html">
    <div class="container">
        <Collection  
          :movies="popularMovies.films" 
          :initLoading="initLoading" 
        />
        <Download 
          v-if="!initLoading"
          @download="loadMore" 
          :loadingMore="loadingMore"
        />
    </div>
</template>

<script>
export default {
  data() {
    return {
      page: 1,
      totalPages: 19,
      popularMovies: [],
      initLoading: true,
      loadingMore: false,
    };
  },
  async created() {
    await this.init();
  },

  methods: {
    async init() {
      try {
        this.popularMovies = await this.getData(
          process.env.urlTopFilms,
          {
            type: "TOP_100_POPULAR_FILMS",
            page: 1,
          }
        );

        this.initLoading = false;
      } catch (e) {
        this.$nuxt.context.error({ statusCode: 404 });
      }
    },

    async loadMore() {
      if (this.totalPages <= ++this.page) return;
      this.loadingMore = true;
      const data = await this.getData(
        process.env.urlTopFilms,
        {
          type: "TOP_100_POPULAR_FILMS",
          page: this.page,
        }
      );
      this.loadingMore = false;
      if (data)
        this.popularMovies.films = [...this.popularMovies.films, ...data.films];
    },
  },
};
</script>

<style scoped>
</style>