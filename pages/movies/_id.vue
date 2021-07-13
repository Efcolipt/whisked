<template lang="html">
    <div>
        <CollectionView :movie="movie" />
    </div>
</template>

<script>
export default {
  validate({ params }) {
    return params.id && parseInt(+params.id) && params.id > 0;
  },
  async asyncData({ params, $axios }) {
    const movie = await $axios.$get(
      `${process.env.urlDetailFilms}/${params.id}`,
      {
        headers: {
          "X-API-KEY": process.env.apiKey,
        },
      }
    );

    return {
      movie: movie.data,
    };
  },

  head() {
    return {
      title: this.movie.nameRu + " | Whisked",
      meta: [
        {
          hid: "description",
          name: "description",
          content: this.movie.description,
        },
        {
          hid: "canonical",
          rel: "canonical",
          href: process.env.baseUrl + this.$route.fullPath,
        },
        {
          hid: "twitter:title",
          name: "twitter:title",
          content: this.movie.nameRu + " | Whisked",
        },
        {
          hid: "twitter:description",
          name: "twitter:description",
          content: this.movie.description,
        },
        {
          hid: "twitter:image",
          name: "twitter:image",
          content: this.movie.posterUrlPreview,
        },
        {
          hid: "twitter:image:alt",
          name: "twitter:image:alt",
          content: this.movie.nameRu + " | Whisked",
        },
        {
          hid: "og:title",
          property: "og:title",
          content: this.movie.nameRu + " | Whisked",
        },
        {
          hid: "og:description",
          property: "og:description",
          content: this.movie.description,
        },
        {
          hid: "og:image",
          property: "og:image",
          content: this.movie.posterUrlPreview,
        },
        {
          hid: "og:image:secure_url",
          property: "og:image:secure_url",
          content: this.movie.posterUrlPreview,
        },
        {
          hid: "og:image:alt",
          property: "og:image:alt",
          content: this.movie.nameRu + " | Whisked",
        },
        {
          hid: "name:itemprop",
          itemprop: "name",
          content: this.movie.nameRu + " | Whisked",
        },
        {
          hid: "description:itemprop",
          itemprop: "description",
          content: this.movie.description,
        },
        {
          hid: "image:itemprop",
          itemprop: "image",
          content: this.movie.posterUrlPreview,
        },
      ],
    };
  },
};
</script>

<style>
</style>