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
  async asyncData({ params, $axios, error }) {
    try {
      const movie = await $axios.$get(process.env.urlVideo, {
        params: {
          token: process.env.apiVideo,
          kp: params.id,
        },
      });
      if ('error' in movie) return error({ statusCode: 404 });
      return {
        movie: movie.results,
      };
    } catch (e) {
      return error({ statusCode: 404 });
    }
  },

  head() {
    return {
      title: this.movie[0]["info"]["rus"] + " | Whisked",
      meta: [
        {
          hid: "description",
          name: "description",
          content: this.movie[0]["info"]["description"],
        },
        {
          hid: "canonical",
          rel: "canonical",
          href: process.env.baseUrl + this.$route.fullPath,
        },
        {
          hid: "twitter:title",
          name: "twitter:title",
          content: this.movie[0]["info"]["rus"] + " | Whisked",
        },
        {
          hid: "twitter:description",
          name: "twitter:description",
          content: this.movie[0]["info"]["description"],
        },
        {
          hid: "twitter:image",
          name: "twitter:image",
          content: this.movie[0]["info"]["poster"],
        },
        {
          hid: "twitter:image:alt",
          name: "twitter:image:alt",
          content: this.movie[0]["info"]["rus"] + " | Whisked",
        },
        {
          hid: "og:title",
          property: "og:title",
          content: this.movie[0]["info"]["rus"] + " | Whisked",
        },
        {
          hid: "og:description",
          property: "og:description",
          content: this.movie[0]["info"]["description"],
        },
        {
          hid: "og:image",
          property: "og:image",
          content: this.movie[0]["info"]["poster"],
        },
        {
          hid: "og:image:secure_url",
          property: "og:image:secure_url",
          content: this.movie[0]["info"]["poster"],
        },
        {
          hid: "og:image:alt",
          property: "og:image:alt",
          content: this.movie[0]["info"]["rus"] + " | Whisked",
        },
        {
          hid: "name:itemprop",
          itemprop: "name",
          content: this.movie[0]["info"]["rus"] + " | Whisked",
        },
        {
          hid: "description:itemprop",
          itemprop: "description",
          content: this.movie[0]["info"]["description"],
        },
        {
          hid: "image:itemprop",
          itemprop: "image",
          content: this.movie[0]["info"]["poster"],
        },
      ],
    };
  },
};
</script>

<style>
</style>