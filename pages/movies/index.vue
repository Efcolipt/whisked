<template lang="html">
    <div class="container">
        <Collection  
          :movies="movies.films" 
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
      movies: [],
      initLoading: true,
      loadingMore: false,
      currentYear: 2021,
    };
  },
  async created() {
    const date = new Date;
    this.currentYear = date.getFullYear()
    await this.init();
  },

  methods: {
    async init() {
      try {
        this.movies = await this.getData(
          process.env.urlSearchByFilters,
          {
            type: "FILM",
            yearFrom: "2016",
            yearTo: this.currentYear ,
            order: "NUM_VOTE",
            page: 1,
          }
        );
        this.totalPages = this.movies.pagesCount
        this.initLoading = false;
      } catch (e) {
        this.$nuxt.context.error({ statusCode: 404 });
      }
    },

    async loadMore() {
      if (this.totalPages <= ++this.page) return;
      this.loadingMore = true;
      const data = await this.getData(
        process.env.urlSearchByFilters,
          {
            type: "FILM",
            yearFrom: "2016",
            yearTo: this.currentYear,
            order: "NUM_VOTE",
            page: this.page,
          }
      );
      this.loadingMore = false;
      if (data)
        this.movies.films = [...this.movies.films, ...data.films];
    },
  },
};
</script>
